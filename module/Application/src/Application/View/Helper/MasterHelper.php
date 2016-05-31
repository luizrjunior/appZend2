<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class MasterHelper extends AbstractHelper {

    protected $stAtivadoDesativado = array(
        1 => 'Ativado',
        2 => 'Desativado'
    );
    
    protected $tipoUsuario = array(
        1 => 'Sênior',
        2 => 'Pleno',
        3 => 'Junior'
    );
    
    protected $cabeloCor = array(
        1 => 'Loira',
        2 => 'Morena',
        3 => 'Negra',
        4 => 'Ruiva'
    );
    
    protected $tipoVideo = array(
        1 => 'Link',
        2 => 'Embed'
    );
    
    protected $tipoBanner = array(
        1 => 'Banner Principal',
        2 => 'Banner Secundário'
    );
    
    protected $situacaoDepoimento = array(
        1 => 'Aguardando Analise',
        2 => 'Aprovado',
        3 => 'Reprovado'
    );
    
    protected $tpCliente = array(
        1 => 'Anunciante',
        2 => 'Sócio'
    );
    
    protected $tpAlbum = array(
        1 => 'Principal',
        2 => 'Galeria de Fotos'
    );
    
    public function __invoke() {
        return $this;
    }

    public function acrescentarZeros($numero, $qtZeros) {
        return str_pad($numero, $qtZeros, "0", STR_PAD_LEFT);
    }

    public function calcularDias($param) {
        $data = explode("-", $param);
        $ano = $data[0];
        $mes = $data[1];
        $dia = $data[2];

        $dtAtual = explode("-", date('Y-m-d'));
        $anoAtual = $dtAtual[0];
        $mesAtual = $dtAtual[1];
        $diaAtual = $dtAtual[2];

        $timestamp1 = mktime(0, 0, 0, $mes, $dia, $ano);
        $timestamp2 = mktime(4, 12, 0, $mesAtual, $diaAtual, $anoAtual);
        $segundos_diferenca = $timestamp1 - $timestamp2;
        $dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
        $diasDiferenca = round(str_replace("-", "", $dias_diferenca));

        return $diasDiferenca;
    }

    public function limitaCaracteres($string, $qtde) {
        return substr($string, 0, $qtde) . "...";
    }
    
    public function stAtivadoDesativado($status) {
        return $this->stAtivadoDesativado[$status];
    }
    
    public function tipoUsuario($tipoUsuario) {
        return $this->tipoUsuario[$tipoUsuario];
    }
    
    public function cabeloCor($cabeloCor) {
        return $this->cabeloCor[$cabeloCor];
    }
    
    public function tipoVideo($tipoVideo) {
        return $this->tipoVideo[$tipoVideo];
    }
    
    public function tipoBanner($tipoBanner) {
        return $this->tipoBanner[$tipoBanner];
    }
    
    public function situacaoDepoimento($situacaoDepoimento) {
        return $this->situacaoDepoimento[$situacaoDepoimento];
    }
    
    public function tpCliente($tpCliente) {
        return $this->tpCliente[$tpCliente];
    }
    
    public function tpAlbum($tpAlbum) {
        return $this->tpAlbum[$tpAlbum];
    }
}