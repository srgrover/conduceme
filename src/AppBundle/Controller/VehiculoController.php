<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TipoVehiculo;
use AppBundle\Form\Type\TipoVehiculoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/vehiculo/tipos/{tipovehiculo}", name="tipo_vehiculo_modificar")
     */
    public function modificarTiposAction(TipoVehiculo $tipovehiculo)
    {
        dump($tipovehiculo);
        $formulario = $this->createForm(new TipoVehiculoType(), $tipovehiculo);

        return $this->render('AppBundle:Vehiculo:modificar_tipos.html.twig', [
            'tipo_vehiculo' => $tipovehiculo,
            'formulario' => $formulario->createView()
        ]);
    }
}
