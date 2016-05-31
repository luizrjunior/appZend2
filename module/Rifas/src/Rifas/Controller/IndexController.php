<?php

namespace Rifas\Controller;

use Application\Controller\AbstractController;
use Rifas\Form as RifasForms;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DOMPDFModule\View\Model\PdfModel;

class IndexController extends AbstractController {

    private $formPsq;
    private $formCad;

    public function __construct() {
        $this->service = 'Rifas\Service\RifasService';
        $this->_view = new ViewModel();
    }

    public function indexAction() {
        //Formulario de Pesquisa de Valor Rifass
        $this->formPsq = new RifasForms\RifasPsqForm();
        $this->_view->setVariable('formPsqRifas', $this->formPsq);

        //Formulario de Cadastro de Valor Rifas
        $this->formCad = new RifasForms\RifasCadForm();
        $this->_view->setVariable('formCadRifas', $this->formCad);
        
        return $this->_view;
    }

    /**
     * Pesquisar Action
     * @return type
     */
    public function pesquisarRifasAction() {
        $service = $this->getServiceLocator()->get($this->service);
        $pagina = $this->getEvent()->getRouteMatch()->getParam('page');
        $post = $this->getRequest()->getPost()->toArray();
        if ($this->identity()->getTpUsuario() !== 1) {
            $post['idUsuarioPsq'] = $post['idUsuarioPsqRifas'];
        } else {
            $post['idUsuarioPsq'] = $post['idUsuarioSelectPsqRifas'];
        }
        unset($post['idUsuarioPsqRifas']);
        $itens = $this->itemForPage;
        
        $this->_view->setVariable('lista', $service->listarRifasPaginado($post, $pagina, $itens));
        $this->_view->setTerminal(true);
        
        return $this->_view;
    }

    /**
     * Salvar Action
     * @return JsonModel
     */
    public function salvarAction() {
        $post = $this->getRequest()->getPost()->toArray();
        $service = $this->getServiceLocator()->get($this->service);
        $valor = explode(' ', $post['vlRifa']);
        $vlRifa = str_replace(',', '.', $valor[1]);
        $post['idUsuario'] = $post['idUsuarioRifas'];
        $post['vlRifa'] = (float)$vlRifa;
        $post['dtSorteio'] = \DateTime::createFromFormat('d/m/Y', $post['dtSorteio']);
        $arrRifas = $service->salvarRifas($post);
        if ($arrRifas) {
            $tipoMsg = "S";
            $textoMsg = $this->exibeMsgSalvar($post['idRifa']);
        } else {
            $tipoMsg = "E";
            $textoMsg = "Erro ao tentar cadastrar a Rifa! Tente mais tarde.";
        }
        $dados = array();
        if ($arrRifas) {
            $dados['idRifa'] = $arrRifas->getIdRifa();
        }
        $dados['tipoMsg'] = $tipoMsg;
        $dados['textoMsg'] = $textoMsg;

        $result = new JsonModel($dados);
        return $result;
    }

    private function exibeMsgSalvar($idRifa) {
        if ($idRifa) {
            $textoMsg = "Rifa atualizada com sucesso!";
        } else {
            $textoMsg = "Rifa cadastrada com sucesso!";
        }
        return $textoMsg;
    }

    /**
     * Selecionar Action
     * @return JsonModel
     */
    public function selecionarAction() {
        $id = $this->getRequest()->getPost()->toArray();
        $service = $this->getServiceLocator()->get($this->service);
        $repository = $service->selecionarRifas($id);
        if ($repository) {
            $tipoMsg = "S";
            $textoMsg = "Registro encontrado!";
            $dados = $this->carregarDados($repository);
        } else {
            $tipoMsg = "I";
            $textoMsg = "Registro não encontrado!";
            $dados = NULL;
        }
        $dados['tipoMsg'] = $tipoMsg;
        $dados['textoMsg'] = $textoMsg;

        $result = new JsonModel($dados);
        return $result;
    }

    /**
     * Carregar Dados do Valor do Rifas
     * @param type $repository
     * @return type
     */
    private function carregarDados($repository) {
        $vlRifa = "R$ " . str_replace('.', ',', $repository->getVlRifa());
        $array['idRifa'] = $repository->getIdRifa();
        $array['idUsuario'] = $repository->getIdUsuario()->getIdUsuario();
        $array['nuInicio'] = $repository->getNuInicio();
        $array['nuFinal'] = $repository->getNuFinal();
        $array['qtPremio'] = $repository->getQtPremio();
        $array['vlRifa'] = $vlRifa;
        $array['dtSorteio'] = $repository->getDtSorteio()->format('d/m/Y');
        $array['dsInstituicao'] = $repository->getDsInstituicao();
        $array['dsPremio'] = $repository->getDsPremio();
        $array['dsObservacao'] = $repository->getDsObservacao();
        $array['stPdf'] = $repository->getStPdf();
        return $array;
    }

    /**
     * Excluir Action
     * @return JsonModel
     */
    public function excluirAction() {
        $post = $this->getRequest()->getPost()->toArray();
        $service = $this->getServiceLocator()->get($this->service);
        $repository = $service->selecionarRifas($post['idRifa']);
        if ($repository) {
            if ($service->excluirRifas($repository)) {
                $tipoMsg = "S";
                $textoMsg = "Registro deletado com sucesso!";
            } else {
                $tipoMsg = "E";
                $textoMsg = "Não foi possível deletar o registro!";
            }
        } else {
            $tipoMsg = "I";
            $textoMsg = "Registro não foi encontrado!";
        }

        $dados = array();
        $dados['tipoMsg'] = $tipoMsg;
        $dados['textoMsg'] = $textoMsg;

        $result = new JsonModel($dados);
        return $result;
    }

    public function gerarPdfRifasAction() {
        $idRifa = $this->getEvent()->getRouteMatch()->getParam('id');
        $service = $this->getServiceLocator()->get($this->service);
        $repository = $service->selecionarRifas($idRifa);
        $dados = $this->carregarDados($repository);
        
        $post['idRifa'] = $dados['idRifa'];
        $post['idUsuario'] = $dados['idUsuario'];
        $post['stPdf'] = 1;
        $service->salvarRifas($post);
        
    	$this->layout(false);
    	$pdf = new PdfModel();
        $pdf->setOption('filename', 'Rifas'); // Triggers PDF download, automatically appends ".pdf"
        $pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
        $pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"

        // To set view variables
        $pdf->setVariables(array(
          'dados' => $dados
        ));
        return $pdf;
    }
    
    public function gerarPdfRifasTesteAction() {
        $idRifa = $this->getEvent()->getRouteMatch()->getParam('id');
        $service = $this->getServiceLocator()->get($this->service);
        $repository = $service->selecionarRifas($idRifa);
        $dados = $this->carregarDados($repository);
        
    	$this->layout(false);
    	$pdf = new PdfModel();
        $pdf->setOption('filename', 'RifasTeste'); // Triggers PDF download, automatically appends ".pdf"
        $pdf->setOption('paperSize', 'a4'); // Defaults to "8x11"
        $pdf->setOption('paperOrientation', 'portrait'); // Defaults to "portrait"

        // To set view variables
        $pdf->setVariables(array(
          'dados' => $dados
        ));
        return $pdf;
    }
    
    public function sortearRifasAction() {
        $post = $this->getRequest()->getPost()->toArray();
        $numbers = range($post['nuInicio'], $post['nuFinal']);
        $nuSorteado = $this->sortearNumero($numbers);
        if (!$this->verificarNumeroSorteado($nuSorteado)) {
            $array['nuSorteado'] = $nuSorteado;
        } else {
            $array['nuSorteado'] = NULL;
        }
        $result = new JsonModel($array);
        return $result;
    }
    
    private function sortearNumero($numbers) {
        shuffle($numbers);
        $i = 1;
        while (!is_null($current = array_shift($numbers))) {
            if ($i == 1) {
                $nuSorteado = $this->Mkdir()->acrescentarZeros($current,3);
            }
            $i++;
        }
        return $nuSorteado;
    }
    
    private function verificarNumeroSorteado($nuSorteado) {
        $service = $this->getServiceLocator()->get('Rifas\Service\PremiadoService');
        $post = $this->getRequest()->getPost()->toArray();
        $param = array('idRifaPsq' => $post['idRifa'], 'nuRifaPsq' => (int) $nuSorteado);
        $entities = $service->listarPremiado($param);
        if ($entities) {
            $stPremiado = true;
        } else {
            $stPremiado = false;
        }
        return $stPremiado;
    }
    
    public function carregarPremiacaoAction() {
        $service = $this->getServiceLocator()->get('Rifas\Service\PremiadoService');
        $post = $this->getRequest()->getPost()->toArray();
        $post['idRifaPsq'] = $post['idRifa'];
        $entities = $service->listarPremiado($post);
        $array = array();
        if (count($entities)<$post['qtPremio']) {
            $array[0]['nuPremio'] = count($entities) + 1;
            $array[0]['nuRifa'] = "----";
            $array[0]['disabled'] = '';
            $array[0]['stFinalizado'] = 2;
        } else {
            $array[0]['nuPremio'] = count($entities) + 1;
            $array[0]['nuRifa'] = "----";
            $array[0]['disabled'] = '';
            $array[0]['stFinalizado'] = 1;
        }
        foreach ($entities as $entity) {
            $array[$entity['idPremiado']]['nuPremio'] = $entity['nuPremio'];
            $array[$entity['idPremiado']]['nuRifa'] = $this->Mkdir()->acrescentarZeros($entity['nuRifa'],3);
            $array[$entity['idPremiado']]['disabled'] = 'disabled';
            $array[$entity['idPremiado']]['stFinalizado'] = 2;
        }
        $result = new JsonModel($array);
        return $result;
    }

    public function gravarRifaPremiadaAction() {
        $post = $this->getRequest()->getPost()->toArray();
        $post['stRifa'] = 1;
        $post['dtSorteio'] = \DateTime::createFromFormat('d/m/Y', $post['dtSorteio']);
        $service = $this->getServiceLocator()->get('Rifas\Service\PremiadoService');
        $entities = $service->salvarPremiado($post);
        if ($entities) {
            $tipoMsg = "S";
            $textoMsg = $this->exibeMsgSalvarPremiado($post['idPremiado']);
        } else {
            $tipoMsg = "E";
            $textoMsg = "Erro ao tentar cadastrar o Prêmio! Tente mais tarde.";
        }
        $dados = array();
        if ($entities) {
            $dados['idPremiado'] = $entities->getIdPremiado();
        }
        $dados['tipoMsg'] = $tipoMsg;
        $dados['textoMsg'] = $textoMsg;

        $result = new JsonModel($dados);
        return $result;
    }
    
    private function exibeMsgSalvarPremiado($idPremiado) {
        if ($idPremiado) {
            $textoMsg = "Prêmio atualizada com sucesso!";
        } else {
            $textoMsg = "Rifa Premiada cadastrada com sucesso!";
        }
        return $textoMsg;
    }

}
