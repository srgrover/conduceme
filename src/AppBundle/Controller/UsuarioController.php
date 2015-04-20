<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoVehiculo;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Vehiculo;
use AppBundle\Form\Type\TipoVehiculoType;
use AppBundle\Form\Type\UsuarioType;
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
     * @Security(expression="has_role('ROLE_ADMIN')")
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

    /**
     * @Route("/nuevo", name="usuarios_nuevo")
     * @Security(expression="has_role('ROLE_ADMIN')")
     */
    public function nuevoAction(Request $peticion)
    {
        $usuario = new Usuario();

        // Crear el formulario a partir de la clase
        $formulario = $this->createForm(new UsuarioType(), $usuario);

        // Procesar el formulario si se ha enviado con un POST
        $formulario->handleRequest($peticion);

        // Si se ha enviado y el contenido es válido, guardar los cambios
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            // Obtener el EntityManager
            $em = $this->getDoctrine()->getManager();

            $helper =  $password = $this->container->get('security.password_encoder');
            $usuario->setPassword($helper->encodePassword($usuario, $usuario->getPassword()));

            // Asegurarse de que se tiene en cuenta el nuevo tipo de vehículo
            $em->persist($usuario);

            // Guardar los cambios
            $em->flush();

            // Redirigir al usuario a la lista
            return new RedirectResponse(
                $this->generateUrl('usuarios_listar')
            );
        }
        return $this->render('AppBundle:Usuario:nuevo.html.twig', [
            'formulario' => $formulario->createView()
        ]);
    }


    /**
     * @Route("/modificar/{usuario}", name="usuarios_modificar")
     * @Security(expression="has_role('ROLE_ADMIN')")
     */
    public function modificarAction(Request $peticion, Usuario $usuario)
    {
        // Crear el formulario a partir de la clase
        $formulario = $this->createForm(new UsuarioType(), $usuario);

        // Procesar el formulario si se ha enviado con un POST
        $formulario->handleRequest($peticion);

        // Si se ha enviado y el contenido es válido, guardar los cambios
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            // Obtener el EntityManager
            $em = $this->getDoctrine()->getManager();

            $helper =  $password = $this->container->get('security.password_encoder');
            $usuario->setPassword($helper->encodePassword($usuario, $usuario->getPassword()));

            // Asegurarse de que se tiene en cuenta el nuevo tipo de vehículo
            $em->persist($usuario);

            // Guardar los cambios
            $em->flush();

            // Redirigir al usuario a la lista
            return new RedirectResponse(
                $this->generateUrl('usuarios_listar')
            );
        }
        return $this->render('AppBundle:Usuario:modificar.html.twig', [
            'formulario' => $formulario->createView()
        ]);
    }

}
