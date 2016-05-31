<?php

namespace DoctrineORMModule\Proxy\__CG__\Rifas\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class RifaEntity extends \Rifas\Entity\RifaEntity implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'idRifa', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'qtPremio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'nuInicio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'nuFinal', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'vlRifa', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsInstituicao', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsPremio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsObservacao', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dtSorteio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'idUsuario', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'stPdf');
        }

        return array('__isInitialized__', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'idRifa', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'qtPremio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'nuInicio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'nuFinal', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'vlRifa', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsInstituicao', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsPremio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dsObservacao', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'dtSorteio', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'idUsuario', '' . "\0" . 'Rifas\\Entity\\RifaEntity' . "\0" . 'stPdf');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (RifaEntity $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdRifa()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdRifa();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdRifa', array());

        return parent::getIdRifa();
    }

    /**
     * {@inheritDoc}
     */
    public function setQtPremio($qtPremio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQtPremio', array($qtPremio));

        return parent::setQtPremio($qtPremio);
    }

    /**
     * {@inheritDoc}
     */
    public function getQtPremio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQtPremio', array());

        return parent::getQtPremio();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuInicio($nuInicio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuInicio', array($nuInicio));

        return parent::setNuInicio($nuInicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuInicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuInicio', array());

        return parent::getNuInicio();
    }

    /**
     * {@inheritDoc}
     */
    public function setNuFinal($nuFinal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNuFinal', array($nuFinal));

        return parent::setNuFinal($nuFinal);
    }

    /**
     * {@inheritDoc}
     */
    public function getNuFinal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNuFinal', array());

        return parent::getNuFinal();
    }

    /**
     * {@inheritDoc}
     */
    public function setVlRifa($vlRifa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVlRifa', array($vlRifa));

        return parent::setVlRifa($vlRifa);
    }

    /**
     * {@inheritDoc}
     */
    public function getVlRifa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVlRifa', array());

        return parent::getVlRifa();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsInstituicao($dsInstituicao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsInstituicao', array($dsInstituicao));

        return parent::setDsInstituicao($dsInstituicao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsInstituicao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsInstituicao', array());

        return parent::getDsInstituicao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsPremio($dsPremio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsPremio', array($dsPremio));

        return parent::setDsPremio($dsPremio);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsPremio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsPremio', array());

        return parent::getDsPremio();
    }

    /**
     * {@inheritDoc}
     */
    public function setDsObservacao($dsObservacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDsObservacao', array($dsObservacao));

        return parent::setDsObservacao($dsObservacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getDsObservacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDsObservacao', array());

        return parent::getDsObservacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtSorteio($dtSorteio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtSorteio', array($dtSorteio));

        return parent::setDtSorteio($dtSorteio);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtSorteio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtSorteio', array());

        return parent::getDtSorteio();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdUsuario(\Rifas\Entity\UsuarioEntity $idUsuario = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUsuario', array($idUsuario));

        return parent::setIdUsuario($idUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUsuario', array());

        return parent::getIdUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function getStPdf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStPdf', array());

        return parent::getStPdf();
    }

    /**
     * {@inheritDoc}
     */
    public function setStPdf($stPdf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStPdf', array($stPdf));

        return parent::setStPdf($stPdf);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

}