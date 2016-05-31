<?php

namespace Rifas\Form;

use Zend\Form\Form;

use Rifas\Form\Filter\RifasPsqFilter;

class RifasPsqForm extends Form {

    public function __construct() {
        parent::__construct(NULL);

        $this->setAttribute('method', 'POST');
        $this->setAttribute('id', 'formPsqRifas');

        $this->setInputFilter(new RifasPsqFilter());

        $this->add(
                array(
                    'name' => 'idUsuarioPsqRifas',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'idUsuarioPsqRifas'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'idUsuarioSelectPsqRifas',
                    'type' => 'select',
                    'attributes' => array(
                        'id' => 'idUsuarioSelectPsqRifas',
                        'class' => 'form-control'
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dsInstituicaoPsq',
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'dsInstituicaoPsq',
                        'class' => 'form-control',
                        'maxlength' => 25
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dsPremioPsq',
                    'attributes' => array(
                        'type' => 'text',
                        'id' => 'dsPremioPsq',
                        'class' => 'form-control',
                        'maxlength' => 25
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dtInicioPsq',
                    'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'dtInicioPsq'
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dtFinalPsq',
                    'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'dtFinalPsq'
                    )
                )
        );

        $this->add(array(
            'name' => 'btnPesquisarRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnPesquisarRifas'
            ),
            'options' => array(
                'label' => 'Pesquisar'
            )
        ));

        $this->add(array(
            'name' => 'btnNovoRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnNovoRifas'
            ),
            'options' => array(
                'label' => 'Adicionar'
            )
        ));

    }

}