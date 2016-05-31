<?php

namespace Rifas\Service;

use Application\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PremiadoService extends AbstractService {

    protected $_repository;

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Rifas\Entity\PremiadoEntity';
        $this->_repository = $this->em->getRepository($this->entity);
    }

    public function verificarNomeExistente($param) {
        $repository = $this->_repository->verificarNomeExistente($param);
        return $repository;
    }

    public function selecionarPremiado($id) {
        $repository = $this->_repository->selecionarPremiado($id);
        return $repository;
    }

    public function selecionarPremiadoBy($param) {
        $repository = $this->_repository->selecionarPremiadoBy($param);
        return $repository;
    }

    public function listarPremiado($params = array()) {
        $result = $this->_repository->listarPremiado($params);
        return $result;
    }

    public function salvarPremiado($data) {
        $data['idRifa'] = $this->em->getRepository('Rifas\Entity\RifaEntity')
                ->find($data['idRifa']);
        if (isset($data['idPremiado']) && $data['idPremiado'] != "") {
            $repository = $this->_repository->editarPremiado($data);
        } else {
            $repository = $this->_repository->inserirPremiado($data);
        }
        return $repository;
    }

    public function excluirPremiado($repository) {
        $entity = $this->_repository->excluirPremiado($repository);
        return $entity;
    }

}
