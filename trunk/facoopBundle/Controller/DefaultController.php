<?php

namespace msql\facoopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('msqlfacoopBundle:Default:index.html.twig', array('name' => $name));
    }
    
}
