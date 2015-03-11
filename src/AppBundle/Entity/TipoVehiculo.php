<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TipoVehiculo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Marca")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Marca
     */
    protected $marca;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="TipoMotor")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var TipoMotor
     */
    protected $tipoMotor;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $caballos;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $puertas;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return TipoVehiculo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set caballos
     *
     * @param integer $caballos
     * @return TipoVehiculo
     */
    public function setCaballos($caballos)
    {
        $this->caballos = $caballos;

        return $this;
    }

    /**
     * Get caballos
     *
     * @return integer 
     */
    public function getCaballos()
    {
        return $this->caballos;
    }

    /**
     * Set puertas
     *
     * @param integer $puertas
     * @return TipoVehiculo
     */
    public function setPuertas($puertas)
    {
        $this->puertas = $puertas;

        return $this;
    }

    /**
     * Get puertas
     *
     * @return integer 
     */
    public function getPuertas()
    {
        return $this->puertas;
    }

    /**
     * Set marca
     *
     * @param Marca $marca
     * @return TipoVehiculo
     */
    public function setMarca(Marca $marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return Marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set tipoMotor
     *
     * @param TipoMotor $tipoMotor
     * @return TipoVehiculo
     */
    public function setTipoMotor(TipoMotor $tipoMotor)
    {
        $this->tipoMotor = $tipoMotor;

        return $this;
    }

    /**
     * Get tipoMotor
     *
     * @return TipoMotor
     */
    public function getTipoMotor()
    {
        return $this->tipoMotor;
    }

    public function __toString()
    {
        return $this->getMarca()
            . ' ' . $this->getModelo()
            . ' ' . $this->getTipoMotor()
            . ' ' . $this->getCaballos() . 'CV'
            . ' ' . $this->getPuertas() . ' puertas';
    }
}
