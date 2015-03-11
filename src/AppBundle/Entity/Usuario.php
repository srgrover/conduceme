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
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     * @return Usuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string 
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nie
     *
     * @param string $nie
     * @return Usuario
     */
    public function setNie($nie)
    {
        $this->nie = $nie;

        return $this;
    }

    /**
     * Get nie
     *
     * @return string 
     */
    public function getNie()
    {
        return $this->nie;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set descuento
     *
     * @param float $descuento
     * @return Usuario
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return float 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set esCliente
     *
     * @param boolean $esCliente
     * @return Usuario
     */
    public function setEsCliente($esCliente)
    {
        $this->esCliente = $esCliente;

        return $this;
    }

    /**
     * Get esCliente
     *
     * @return boolean 
     */
    public function getEsCliente()
    {
        return $this->esCliente;
    }

    /**
     * Set esOperador
     *
     * @param boolean $esOperador
     * @return Usuario
     */
    public function setEsOperador($esOperador)
    {
        $this->esOperador = $esOperador;

        return $this;
    }

    /**
     * Get esOperador
     *
     * @return boolean 
     */
    public function getEsOperador()
    {
        return $this->esOperador;
    }

    /**
     * Set esAdministrador
     *
     * @param boolean $esAdministrador
     * @return Usuario
     */
    public function setEsAdministrador($esAdministrador)
    {
        $this->esAdministrador = $esAdministrador;

        return $this;
    }

    /**
     * Get esAdministrador
     *
     * @return boolean 
     */
    public function getEsAdministrador()
    {
        return $this->esAdministrador;
    }

    public function __toString()
    {
        return $this->getNombreUsuario() . ' (' . $this->getNie() . ')';
    }
}
