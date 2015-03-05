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
     * @ORM\Column(type="text")
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
}