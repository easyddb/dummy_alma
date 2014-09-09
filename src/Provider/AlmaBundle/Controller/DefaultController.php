<?php

namespace Provider\AlmaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProviderAlmaBundle:Default:index.html.twig');
    }
}
