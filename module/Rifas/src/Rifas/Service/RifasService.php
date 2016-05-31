<?php

namespace Rifas\Service;

use Application\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class RifasService extends AbstractService {

    protected $_repository;

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Rifas\Entity\RifaEntity';
        $this->_repository = $this->em->getRepository($this->entity);
    }

    public function verificarNomeExistente($param) {
        $repository = $this->_repository->verificarNomeExistente($param);
        return $repository;
    }

    public function selecionarRifas($id) {
        $repository = $this->_repository->selecionarRifas($id);
        return $repository;
    }

    public function selecionarRifasBy($param) {
        $repository = $this->_repository->selecionarRifasBy($param);
        return $repository;
    }

    public function listarRifasPaginado($params = array(), $pagina = 1, $range = 10) {
        $result = $this->_repository->listarRifasPaginado($params, $pagina, $range);
        return $result;
    }

    public function listarRifas($params = array()) {
        $result = $this->_repository->listarRifas($params);
        return $result;
    }

    public function salvarRifas($data) {
        $data['idUsuario'] = $this->em->getRepository('Usuario\Entity\UsuarioEntity')
                ->find($data['idUsuario']);
        if (isset($data['idRifa']) && $data['idRifa'] != "") {
            $repository = $this->_repository->editarRifas($data);
        } else {
            $repository = $this->_repository->inserirRifas($data);
        }
        return $repository;
    }

    public function excluirRifas($repository) {
        $entity = $this->_repository->excluirRifas($repository);
        return $entity;
    }

}
