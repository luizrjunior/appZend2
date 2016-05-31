<?php

namespace Login\Entity\Repository;

use Login\Entity\CodPromoEntity;
use Doctrine\ORM\EntityRepository;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator;

/**
 * PreCadastroRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CodPromoRepository extends EntityRepository
{
    //Função que verifica se o código ja esá cadastrado
    public function verificaCodExiste($nomeCodigo, $id=null){
        //Array para validar Código Promocional
        $dadosCod = $this->createQueryBuilder('c')
                    ->where('c.noCod = :codigo')->setParameter('codigo', $nomeCodigo);
                
        //Verifica se possui ID
        if($id != null)//Em caso de alterar o código já gravado
            $dadosCod->andWhere('c.idCod <> :id')->setParameter('id', $id);
        
        //executa a Quqery
        $array = $dadosCod->getQuery()->getArrayResult();
        
         //Verifica se o nome do código existe
         if(count($array) > 0){
             //Se o nome do código existe retorna falso
             return false;
         }else{
             //Se o nome do código não existe retorna verdadeiro
             return true;
         }//if / else Cod Existe
    }//verifCodExiste
    
    //Insere dados do Código Promocional
    public function insereCodPromocional($arrayDados){
        $novoCodPromo = new CodPromoEntity($arrayDados);
        
        $this->getEntityManager()->persist($novoCodPromo);
        $this->getEntityManager()->flush();
        
        return $novoCodPromo;
    }//Insere cod promocional
    
    //Altera os dados do Código Promocional
    public function alteraCodPromocional($id,$arrayDados){
       $entity = $this->getEntityManager()->getReference('Login\Entity\CodPromoEntity', $id);
       
        if($arrayDados['stCod'] != '')
            $entity->setStCod($arrayDados['stCod']);
        if($arrayDados['noCod'] != '')
            $entity->setNoCod($arrayDados['noCod']);
        if($arrayDados['dsCod'] != '')
            $entity->setDsCod($arrayDados['dsCod']);
        if($arrayDados['nuDiasContrato'] != '')
            $entity->setNuDiasContrato($arrayDados['nuDiasContrato']);
        if($arrayDados['dtExpira'] != '')
            $entity->setDtExpira($arrayDados['dtExpira']);
        if($arrayDados['qdAtual'] != '')
            $entity->setQdAtual($arrayDados['qdAtual']);
        if($arrayDados['qdMax'] != '')
            $entity->setQdMax($arrayDados['qdMax']);
        if($arrayDados['vlDesconto'] != '')
            $entity->setVlDesconto($arrayDados['vlDesconto']);
        
        $this->getEntityManager()->flush();

        return $entity;
    }//Altera cod promocional
    
    //Pesquisa na tabela de acordo com os parâmetros passados.
    //Retorna um array com a lista de resultados.
    public function pesquisarCod($arrayParams){
        $verifParam = 0;//Verifica se foi setado alguma valor diferente de vazio
        
        $dadosCod = $this->createQueryBuilder('c');
        //Verifica os parâmetros
        //Nome do Código
        if($arrayParams['noCod'] != ''){
            $dadosCod->where('c.noCod LIKE :codigo')->setParameter('codigo', '%'.$arrayParams['noCod'].'%');
            $verifParam = 1;
        }            
        //Situação do Código
        if($arrayParams['stCod'] != ''){
            $dadosCod->where('c.stCod = :situacao')->setParameter('situacao', $arrayParams['stCod']);
            $verifParam = 1;
        }
        //Data Expira Inicial
        if($arrayParams['dtExpiraIni'] != ''){
            $dadosCod->where('c.dtExpira >= :dtExpiraIni')->setParameter('dtExpiraIni', $arrayParams['dtExpiraIni']);
            $verifParam = 1;
        }
        //Data Expira Final
        if($arrayParams['dtExpiraFinal'] != ''){
            if($arrayParams['dtExpiraIni'] != '')
                $dadosCod->andWhere('c.dtExpira <= :dtExpiraFinal')->setParameter('dtExpiraFinal', $arrayParams['dtExpiraFinal']);
            else
                $dadosCod->where('c.dtExpira <= :dtExpiraFinal')->setParameter('dtExpiraFinal', $arrayParams['dtExpiraFinal']);
            $verifParam = 1;    
        }
        
        //Veriica se existe parâmetro de pesquisa
        if($verifParam == 0 ){
            //Não possui parâmetro de pesquisa
            $array = $this->createQueryBuilder('c')->where('1=1')->orderBy('c.dtExpira','ASC')->setMaxResults(10)->getQuery()->getArrayResult();
        }else{
            //executa a Quqery
            $array = $dadosCod->orderBy('c.dtExpira','ASC')->getQuery()->getArrayResult();
        }
        
        //Retorna a lista de resultados num Array
        return $array;
    }//PesquisarCod
    
}//CodPromoRepository