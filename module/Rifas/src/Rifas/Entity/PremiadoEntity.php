<?php

namespace Rifas\Entity;

use Application\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * PremiadoEntity
 *
 * @ORM\Table(name="tb_premiado", indexes={@ORM\Index(name="fk_tb_premiado_tb_rifa1_idx", columns={"ID_RIFA"})})
 * @ORM\Entity(repositoryClass="Rifas\Entity\Repository\PremiadoRepository")
 */
class PremiadoEntity extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_PREMIADO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPremiado;

    /**
     * @var integer
     *
     * @ORM\Column(name="NU_RIFA", type="integer", nullable=false)
     */
    private $nuRifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="NU_PREMIO", type="integer", nullable=false)
     */
    private $nuPremio;

    /**
     * @var integer
     *
     * @ORM\Column(name="ST_RIFA", type="integer", nullable=false)
     */
    private $stRifa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_SORTEIO", type="date", nullable=false)
     */
    private $dtSorteio;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_OBSERVACAO", type="string", length=45, nullable=true)
     */
    private $dsObservacao;

    /**
     * @var \Rifas\Entity\RifaEntity
     *
     * @ORM\ManyToOne(targetEntity="Rifas\Entity\RifaEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_RIFA", referencedColumnName="ID_RIFA")
     * })
     */
    private $idRifa;

    /**
     * Get idPremiado
     *
     * @return integer 
     */
    public function getIdPremiado() {
        return $this->idPremiado;
    }

    /**
     * Set nuRifa
     *
     * @param integer $nuRifa
     * @return PremiadoEntity
     */
    public function setNuRifa($nuRifa) {
        $this->nuRifa = $nuRifa;

        return $this;
    }

    /**
     * Get nuRifa
     *
     * @return integer 
     */
    public function getNuRifa() {
        return $this->nuRifa;
    }

    /**
     * Set nuPremio
     *
     * @param integer $nuPremio
     * @return PremiadoEntity
     */
    public function setNuPremio($nuPremio) {
        $this->nuPremio = $nuPremio;

        return $this;
    }

    /**
     * Get nuPremio
     *
     * @return integer 
     */
    public function getNuPremio() {
        return $this->nuPremio;
    }

    /**
     * Set stRifa
     *
     * @param integer $stRifa
     * @return PremiadoEntity
     */
    public function setStRifa($stRifa) {
        $this->stRifa = $stRifa;

        return $this;
    }

    /**
     * Get stRifa
     *
     * @return integer 
     */
    public function getStRifa() {
        return $this->stRifa;
    }

    /**
     * Set dtSorteio
     *
     * @param \DateTime $dtSorteio
     * @return PremiadoEntity
     */
    public function setDtSorteio($dtSorteio) {
        $this->dtSorteio = $dtSorteio;

        return $this;
    }

    /**
     * Get dtSorteio
     *
     * @return \DateTime 
     */
    public function getDtSorteio() {
        return $this->dtSorteio;
    }

    /**
     * Set dsObservacao
     *
     * @param string $dsObservacao
     * @return PremiadoEntity
     */
    public function setDsObservacao($dsObservacao) {
        $this->dsObservacao = $dsObservacao;

        return $this;
    }

    /**
     * Get dsObservacao
     *
     * @return string 
     */
    public function getDsObservacao() {
        return $this->dsObservacao;
    }

    /**
     * Set idRifa
     *
     * @param \Rifas\Entity\RifaEntity $idRifa
     * @return PremiadoEntity
     */
    public function setIdRifa(\Rifas\Entity\RifaEntity $idRifa = null) {
        $this->idRifa = $idRifa;

        return $this;
    }

    /**
     * Get idRifa
     *
     * @return \Rifas\Entity\RifaEntity 
     */
    public function getIdRifa() {
        return $this->idRifa;
    }

    /**
     * @param array $options
     */
    public function __construct(Array $options = array()) {
        parent::__construct($options);
    }
    
}
