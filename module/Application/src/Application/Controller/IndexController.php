<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Controller\AbstractController;
use Rifas\Form as RifasForms;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController {

    private $formPsq;
    private $formCad;

    public function __construct() {
        $this->_view = new ViewModel();
    }

    public function indexAction() {
        if (!$this->identity()) {
            return $this->redirect()->toRoute('login', array('controller' => 'index', 'action' => 'index'));
        }
        //Formulario de Pesquisa de Valor Rifass
        $this->formPsq = new RifasForms\RifasPsqForm();
        $this->_view->setVariable('formPsqRifas', $this->formPsq);

        //Formulario de Cadastro de Valor Rifas
        $this->formCad = new RifasForms\RifasCadForm();
        $this->_view->setVariable('formCadRifas', $this->formCad);

        return $this->_view;
    }

}
