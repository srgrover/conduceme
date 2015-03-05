<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/portada", name="portada")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:portada.html.twig');
    }
}
