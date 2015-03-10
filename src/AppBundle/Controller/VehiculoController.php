<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoVehiculo;
use AppBundle\Form\Type\TipoVehiculoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/vehiculo")
 */
class VehiculoController extends Controller
{
    /**
     * @Route("/listar", name="vehiculos_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculos = $em->getRepository('AppBundle:Vehiculo')
            ->createQueryBuilder('v')
            ->orderBy('v.fechaCompra', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('AppBundle:Vehiculo:listar.html.twig', [
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * @Route("/tipos", name="tipo_vehiculo_listar")
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
     * @Route("/tipos/nuevo", name="tipo_vehiculo_nuevo"), methods={'GET', 'POST'}
     */
    public function nuevoTipoAction(Request $peticion)
    {
        // Inicializar un tipo de vehículo vacío
        $tipovehiculo = new TipoVehiculo();

        // Crear el formulario a partir de la clase
        $formulario = $this->createForm(new TipoVehiculoType(), $tipovehiculo);

        // Procesar el formulario si se ha enviado con un POST
        $formulario->handleRequest($peticion);

        // Si se ha enviado y el contenido es válido, guardar los cambios
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            // Obtener el EntityManager
            $em = $this->getDoctrine()->getManager();

            // Asegurarse de que se tiene en cuenta el nuevo tipo de vehículo
            $em->persist($tipovehiculo);

            // Guardar los cambios
            $em->flush();

            // Redirigir al usuario a la lista
            return new RedirectResponse(
                $this->generateUrl('tipo_vehiculo_listar')
            );
        }

        return $this->render('AppBundle:Vehiculo:nuevo_tipo.html.twig', [
            'tipo_vehiculo' => $tipovehiculo,
            'formulario' => $formulario->createView()
        ]);
    }

    /**
     * @Route("/tipos/{tipovehiculo}", name="tipo_vehiculo_modificar"), methods={'GET', 'POST'}
     */
    public function modificarTipoAction(TipoVehiculo $tipovehiculo, Request $peticion)
    {
        // Crear el formulario a partir de la clase
        $formulario = $this->createForm(new TipoVehiculoType(), $tipovehiculo);

        // Añadir dinámicamente el botón de eliminar
        $formulario
            ->add('eliminar', 'submit', [
                'label' => 'Eliminar tipo de vehículo',
                'attr' => [
                    'class' => 'btn btn-danger'
                ]
            ]);

        // Procesar el formulario si se ha enviado con un POST
        $formulario->handleRequest($peticion);

        // Si se ha enviado y el contenido es válido, guardar los cambios
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            // Obtener el EntityManager
            $em = $this->getDoctrine()->getManager();

            if ($formulario->get('eliminar')->isClicked()) {
                $em->remove($tipovehiculo);
            }

            // Guardar los cambios
            $em->flush();

            // Redirigir al usuario a la lista
            return new RedirectResponse(
                $this->generateUrl('tipo_vehiculo_listar')
            );
        }

        return $this->render('AppBundle:Vehiculo:modificar_tipo.html.twig', [
            'tipo_vehiculo' => $tipovehiculo,
            'formulario' => $formulario->createView()
        ]);
    }
}
