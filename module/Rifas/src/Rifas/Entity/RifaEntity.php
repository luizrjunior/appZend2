<?php

namespace Rifas\Entity;

use Application\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * RifaEntity
 *
 * @ORM\Table(name="tb_rifa", indexes={@ORM\Index(name="fk_tb_rifa_tb_usuario_idx", columns={"ID_USUARIO"})})
 * @ORM\Entity(repositoryClass="Rifas\Entity\Repository\RifaRepository")
 */
class RifaEntity extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_RIFA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="QT_PREMIO", type="integer", nullable=false)
     */
    private $qtPremio;

    /**
     * @var integer
     *
     * @ORM\Column(name="NU_INICIO", type="integer", nullable=false)
     */
    private $nuInicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="NU_FINAL", type="integer", nullable=false)
     */
    private $nuFinal;

    /**
     * @var string
     *
     * @ORM\Column(name="VL_RIFA", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $vlRifa;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_INSTITUICAO", type="string", length=255, nullable=true)
     */
    private $dsInstituicao;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_PREMIO", type="string", length=255, nullable=false)
     */
    private $dsPremio;

    /**
     * @var string
     *
     * @ORM\Column(name="DS_OBSERVACAO", type="string", length=255, nullable=true)
     */
    private $dsObservacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DT_SORTEIO", type="date", nullable=false)
     */
    private $dtSorteio;

    /**
     * @var \Usuario\Entity\UsuarioEntity
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\UsuarioEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="ST_PDF", type="integer", nullable=false)
     */
    private $stPdf;
    
    /**
     * Get idRifa
     *
     * @return integer 
     */
    public function getIdRifa() {
        return $this->idRifa;
    }

    /**
     * Set qtPremio
     *
     * @param integer $qtPremio
     * @return RifaEntity
     */
    public function setQtPremio($qtPremio) {
        $this->qtPremio = $qtPremio;
    }

    /**
     * Get qtPremio
     *
     * @return integer 
     */
    public function getQtPremio() {
        return $this->qtPremio;
    }

    /**
     * Set nuInicio
     *
     * @param integer $nuInicio
     * @return RifaEntity
     */
    public function setNuInicio($nuInicio) {
        $this->nuInicio = $nuInicio;
    }

    /**
     * Get nuInicio
     *
     * @return integer 
     */
    public function getNuInicio() {
        return $this->nuInicio;
    }

    /**
     * Set nuFinal
     *
     * @param integer $nuFinal
     * @return RifaEntity
     */
    public function setNuFinal($nuFinal) {
        $this->nuFinal = $nuFinal;
    }

    /**
     * Get nuFinal
     *
     * @return integer 
     */
    public function getNuFinal() {
        return $this->nuFinal;
    }

    /**
     * Set vlRifa
     *
     * @param string $vlRifa
     * @return RifaEntity
     */
    public function setVlRifa($vlRifa) {
        $this->vlRifa = $vlRifa;
    }

    /**
     * Get vlRifa
     *
     * @return string 
     */
    public function getVlRifa() {
        return $this->vlRifa;
    }

    /**
     * Set dsInstituicao
     *
     * @param string $dsInstituicao
     * @return RifaEntity
     */
    public function setDsInstituicao($dsInstituicao) {
        $this->dsInstituicao = $dsInstituicao;
    }

    /**
     * Get dsInstituicao
     *
     * @return string 
     */
    public function getDsInstituicao() {
        return $this->dsInstituicao;
    }

    /**
     * Set dsPremio
     *
     * @param string $dsPremio
     * @return RifaEntity
     */
    public function setDsPremio($dsPremio) {
        $this->dsPremio = $dsPremio;
    }

    /**
     * Get dsPremio
     *
     * @return string 
     */
    public function getDsPremio() {
        return $this->dsPremio;
    }

    /**
     * Set dsObservacao
     *
     * @param string $dsObservacao
     * @return RifaEntity
     */
    public function setDsObservacao($dsObservacao) {
        $this->dsObservacao = $dsObservacao;
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
     * Set dtSorteio
     *
     * @param \DateTime $dtSorteio
     * @return RifaEntity
     */
    public function setDtSorteio($dtSorteio) {
        $this->dtSorteio = $dtSorteio;
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
     * Set idUsuario
     *
     * @param \Usuario\Entity\UsuarioEntity $idUsuario
     * @return RifaEntity
     */
    public function setIdUsuario(\Usuario\Entity\UsuarioEntity $idUsuario = null) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Get idUsuario
     *
     * @return \Usuario\Entity\UsuarioEntity 
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    function getStPdf() {
        return $this->stPdf;
    }

    function setStPdf($stPdf) {
        $this->stPdf = $stPdf;
    }

    /**
     * @param array $options
     */
    public function __construct(Array $options = array()) {
        parent::__construct($options);
    }
    
}
