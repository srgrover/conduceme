<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Usuario
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
    protected $nombreUsuario;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $nie;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    protected $correoElectronico;

    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $descuento;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    protected $esCliente;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    protected $esOperador;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    protected $esAdministrador;
}