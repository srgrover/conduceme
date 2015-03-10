<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoVehiculo;
use AppBundle\Form\Type\TipoVehiculoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class VehiculoController extends Controller
{
    /**
     * @Route("/vehiculo/tipos", name="tipo_vehiculo_listar")
     */
    public function listarTiposAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipos = $em->getRepository('AppBundle:TipoVehiculo')
            ->findAll();

        return $this->render('AppBundle:Vehiculo:listar_tipos.html.twig', [
            'tipos_vehiculos' => $tipos
        ]);
    }

    /**
     * @Route("/vehiculo/tipos/{tipovehiculo}", name="tipo_vehiculo_modificar"), methods={'GET', 'POST'}
     */
    public function modificarTiposAction(TipoVehiculo $tipovehiculo, Request $peticion)
    {
        // Crear el formulario a partir de la clase
        $formulario = $this->createForm(new TipoVehiculoType(), $tipovehiculo);

        // Procesar el formulario si se ha enviado con un POST
        $formulario->handleRequest($peticion);

        // Si se ha enviado y el contenido es válido, guardar los cambios
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            // Obtener el EntityManager
            $em = $this->getDoctrine()->getManager();

            // Guardar los cambios
            $em->flush();

            // Redirigir al usuario a la lista
            return new RedirectResponse(
                $this->generateUrl('tipo_vehiculo_listar')
            );
        }

        return $this->render('AppBundle:Vehiculo:modificar_tipos.html.twig', [
            'tipo_vehiculo' => $tipovehiculo,
            'formulario' => $formulario->createView()
        ]);
    }
}
