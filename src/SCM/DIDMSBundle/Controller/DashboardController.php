<?php

namespace SCM\DIDMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('SCMDIDMSBundle:Dashboard:index.html.twig');
    }
}