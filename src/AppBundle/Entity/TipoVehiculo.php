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
}