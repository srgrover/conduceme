<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Vehiculo
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
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $matricula;

    /**
     * @ORM\ManyToOne(targetEntity="TipoVehiculo")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var TipoVehiculo
     */
    protected $tipo;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    protected $fechaCompra;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $kilometraje;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    protected $observaciones;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $precioDia;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $precioKm;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     *
     * @var Usuario
     */
    protected $cliente;

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
     * Set matricula
     *
     * @param string $matricula
     * @return Vehiculo
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get matricula
     *
     * @return string 
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set fechaCompra
     *
     * @param \DateTime $fechaCompra
     * @return Vehiculo
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;

        return $this;
    }

    /**
     * Get fechaCompra
     *
     * @return \DateTime 
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set kilometraje
     *
     * @param float $kilometraje
     * @return Vehiculo
     */
    public function setKilometraje($kilometraje)
    {
        $this->kilometraje = $kilometraje;

        return $this;
    }

    /**
     * Get kilometraje
     *
     * @return float 
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Vehiculo
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set precioDia
     *
     * @param float $precioDia
     * @return Vehiculo
     */
    public function setPrecioDia($precioDia)
    {
        $this->precioDia = $precioDia;

        return $this;
    }

    /**
     * Get precioDia
     *
     * @return float 
     */
    public function getPrecioDia()
    {
        return $this->precioDia;
    }

    /**
     * Set precioKm
     *
     * @param float $precioKm
     * @return Vehiculo
     */
    public function setPrecioKm($precioKm)
    {
        $this->precioKm = $precioKm;

        return $this;
    }

    /**
     * Get precioKm
     *
     * @return float 
     */
    public function getPrecioKm()
    {
        return $this->precioKm;
    }

    /**
     * Set tipo
     *
     * @param \AppBundle\Entity\TipoVehiculo $tipo
     * @return Vehiculo
     */
    public function setTipo(\AppBundle\Entity\TipoVehiculo $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \AppBundle\Entity\TipoVehiculo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Usuario $cliente
     * @return Vehiculo
     */
    public function setCliente(\AppBundle\Entity\Usuario $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Usuario 
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}
