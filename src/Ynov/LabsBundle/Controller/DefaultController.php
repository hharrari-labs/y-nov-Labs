<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YnovLabsBundle:Default:index.html.twig');
    }
    
    
}
