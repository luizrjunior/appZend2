<?php

namespace Rifas\Form;

use Zend\Form\Form;
use Rifas\Form\Filter\RifasCadFilter;

class RifasCadForm extends Form {

    public function __construct() {
        parent::__construct(NULL);

        $this->setAttribute('method', 'POST');
        $this->setAttribute('action', 'index/salvar');
        $this->setAttribute('id', 'formCadRifas');

        $this->setInputFilter(new RifasCadFilter());

        $this->add(
                array(
                    'name' => 'idRifa',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'idRifa'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'idPremiado',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'idPremiado'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'nuRifa',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'nuRifa'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'nuPremio',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'nuPremio'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'idUsuarioRifas',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'idUsuarioRifas'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'stPdf',
                    'type' => 'hidden',
                    'attributes' => array(
                        'id' => 'stPdf'
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'idUsuarioSelectRifas',
                    'type' => 'select',
                    'attributes' => array(
                        'id' => 'idUsuarioSelectRifas',
                        'class' => 'form-control'
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'nuInicio',
                    'attributes' => array(
                        'type' => 'text',
                        'placeholder' => '1',
                        'id' => 'nuInicio',
                        'class' => 'form-control',
                        'maxlength' => 3
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'nuFinal',
                    'attributes' => array(
                        'type' => 'text',
                        'placeholder' => '10',
                        'id' => 'nuFinal',
                        'class' => 'form-control',
                        'maxlength' => 3
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'qtPremio',
                    'attributes' => array(
                        'type' => 'text',
                        'placeholder' => '1',
                        'id' => 'qtPremio',
                        'class' => 'form-control',
                        'maxlength' => 3
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'vlRifa',
                    'attributes' => array(
                        'type' => 'text',
                        'placeholder' => 'R$',
                        'id' => 'vlRifa',
                        'class' => 'guiMoneyMask form-control',
                        'maxlength' => 14
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dtSorteio',
                    'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'id' => 'dtSorteio'
                    )
                )
        );

        $this->add(
                array(
                    'name' => 'dsInstituicao',
                    'type' => 'textarea',
                    'attributes' => array(
                        'cols' => '50',
                        'rows' => '5',
                        'class' => 'form-control',
                        'id' => 'dsInstituicao',
                        'maxlength' => 255
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'dsPremio',
                    'type' => 'textarea',
                    'attributes' => array(
                        'cols' => '50',
                        'rows' => '5',
                        'class' => 'form-control',
                        'id' => 'dsPremio',
                        'maxlength' => 255
                    ),
                )
        );

        $this->add(
                array(
                    'name' => 'dsObservacao',
                    'type' => 'textarea',
                    'attributes' => array(
                        'cols' => '50',
                        'rows' => '5',
                        'class' => 'form-control',
                        'id' => 'dsObservacao',
                        'maxlength' => 255
                    ),
                )
        );

        $this->add(array(
            'name' => 'btnNovoCadRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnNovoCadRifas',
                'value' => 'Novo'
            ),
            'options' => array(
                'label' => 'Novo'
            )
        ));

        $this->add(array(
            'name' => 'btnGravarRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnGravarRifas',
                'value' => 'Salvar'
            ),
            'options' => array(
                'label' => 'Salvar'
            )
        ));

        $this->add(array(
            'name' => 'btnGerarPdfRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnGerarPdfRifas',
                'value' => 'Gerar PDF'
            ),
            'options' => array(
                'label' => 'Gerar PDF'
            )
        ));

        $this->add(array(
            'name' => 'btnGerarPdfRifasTeste',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnGerarPdfRifasTeste',
                'value' => 'Testar PDF'
            ),
            'options' => array(
                'label' => 'Testar PDF'
            )
        ));

        $this->add(array(
            'name' => 'btnVoltarCadRifas',
            'attributes' => array(
                'type' => 'button',
                'class' => 'btn btn-primary',
                'id' => 'btnVoltarCadRifas',
                'value' => 'Voltar'
            ),
            'options' => array(
                'label' => 'Voltar'
            )
        ));
    }

}