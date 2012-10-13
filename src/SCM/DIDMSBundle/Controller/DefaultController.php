<?php

namespace SCM\DIDMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SCMDIDMSBundle:Default:index.html.twig');
    }
    
    public function loginAction()
    {
       $request = $this->getRequest();
       
       $username = $request->query->get('username'); 
       $password = $request->query->get('password'); 

       if($username == "" || $password == "") 
       {          
           $this->get('session')->getFlashBag()->add('notice', 'Please enter username and password to login!' );
           $this->get('session')->getFlashBag()->add('notice_type', 'warning_message');
           return $this->render('SCMDIDMSBundle:Default:index.html.twig'); 
       }       
       elseif($username == "santhosh@spminfosol.com" && $password == "password") 
       {          
           $response = $this->forward('SCMDIDMSBundle:Dashboard:index');
           return $response;
       }
       else
       {
            $this->get('session')->getFlashBag()->add('notice', 'Invalid username or password!');
            $this->get('session')->getFlashBag()->add('notice_type', 'error_message');
            return $this->render('SCMDIDMSBundle:Default:index.html.twig'); 
       }
    }
}