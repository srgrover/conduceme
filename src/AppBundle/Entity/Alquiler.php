<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Alquiler
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
     * @ORM\ManyToOne(targetEntity="Vehiculo")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Vehiculo
     */
    protected $vehiculo;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Cliente
     */
    protected $cliente;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    protected $fechaRecogida;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    protected $fechaEntrega;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $kilometrosRecogida;

    /**
     * @ORM\Column(type="float", nullable=true)
     *
     * @var float
     */
    protected $kilometrosEntrega;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Cliente
     */
    protected $operadorRecogida;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     *
     * @var Cliente
     */
    protected $operadorEntrega;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    protected $observaciones;

    /**
     * @ORM\Column(type="float", nullable=true)
     *
     * @var float
     */
    protected $cobrado;
}