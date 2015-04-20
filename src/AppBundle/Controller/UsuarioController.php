<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoVehiculo;
use AppBundle\Entity\Vehiculo;
use AppBundle\Form\Type\TipoVehiculoType;
use AppBundle\Form\Type\VehiculoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{
    /**
     * @Route("/listar", name="usuarios_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('AppBundle:Usuario')
            ->createQueryBuilder('u')
            ->orderBy('u.nombreUsuario')
            ->getQuery()
            ->getResult();

        return $this->render('AppBundle:Usuario:listar.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

}
