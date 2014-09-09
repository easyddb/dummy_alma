<?php

namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        /*$patron = $this->getDoctrine()
          ->getRepository('ProviderAlmaBundle:Patron')
          ->getPatronByCredentials('1111110022', '5555');
        var_dump($patron[0]->getBorrcard()->getCardnumber());*/

        return $this->render('ProviderAlmaBundle:Default:index.html.twig');
    }
}
