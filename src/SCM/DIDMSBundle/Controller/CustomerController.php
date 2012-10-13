<?php

namespace SCM\DIDMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SCM\DIDMSBundle\Entity\Customer;

class CustomerController extends Controller {

    public function indexAction() {
        $customer = $this->getDoctrine()->getRepository('SCMDIDMSBundle:Customer');                 
        return $this->render('SCMDIDMSBundle:Customer:index.html.twig', array('customers' => $customer->findAll()));
    }
    
     public function searchAction() {       
        $request = $this->getRequest();               
        $name = $request->query->get('searchvalue'); 
        
        if($name == '')
        {
            $response = $this->forward('SCMDIDMSBundle:Customer:index');
            return $response; 
        }
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT c FROM SCMDIDMSBundle:Customer c WHERE c.name LIKE :name ORDER BY c.name ASC'
        )->setParameter('name', '%'.$name.'%');

        $customer = $query->getResult();

   
       # $customer = $this->getDoctrine()->getRepository('SCMDIDMSBundle:Customer'); 
        
        return $this->render('SCMDIDMSBundle:Customer:index.html.twig', array('customers' => $customer));
    }

    public function addAction() {
        return $this->render('SCMDIDMSBundle:Customer:newcustomer.html.twig');
    }
    
    public function createAction() {
        
        $request = $this->getRequest();
               
        $name = $request->query->get('name'); 
        $email = $request->query->get('email'); 
        $phone = $request->query->get('phone'); 
        $sms = ($request->query->get('sms') == 'on'); 
        $forward = $request->query->get('forward'); 
        $orderid = $request->query->get('orderid'); 
        $comment = $request->query->get('comment'); 
        
        $customer = new Customer();
        $customer->setName($name);
        $customer->setEmail($email);
        $customer->setPhone($phone);
        $customer->setSmsenabled($sms);
        $customer->setForwardingto($forward);
        $customer->setOrderid($orderid);
        $customer->setComment($comment);

        $em = $this->getDoctrine()->getManager();
        $em->persist($customer);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('notice', 'Created customer id ' . $customer->getId());
        $this->get('session')->getFlashBag()->add('notice_type', 'success_message');
        $response = $this->forward('SCMDIDMSBundle:Customer:index');
        return $response;  
    }

    public function editAction($id) {
        $customer = $this->getDoctrine()->getRepository('SCMDIDMSBundle:Customer')->find($id);

        if (!$customer) {
            throw $this->createNotFoundException('No customer found for id ' . $id);
        }

        return $this->render('SCMDIDMSBundle:Customer:edit.html.twig', array('customer' => $customer));  
    }

    public function updateAction($id) {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository('SCMDIDMSBundle:Customer')->find($id);
        
        if (!$customer) {
            throw $this->createNotFoundException('No customer found for id ' . $id);
        }

        $request = $this->getRequest();
               
        $name = $request->query->get('name'); 
        $email = $request->query->get('email'); 
        $phone = $request->query->get('phone'); 
        $sms = ($request->query->get('sms') == 'on'); 
        $forward = $request->query->get('forward'); 
        $orderid = $request->query->get('orderid'); 
        $comment = $request->query->get('comment'); 
        
        $customer->setName($name);
        $customer->setEmail($email);
        $customer->setPhone($phone);
        $customer->setSmsenabled($sms);
        $customer->setForwardingto($forward);
        $customer->setOrderid($orderid);
        $customer->setComment($comment);
        
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Customer ' . $id . ' details successfully saved.');
        $this->get('session')->getFlashBag()->add('notice_type', 'success_message');
        $response = $this->forward('SCMDIDMSBundle:Customer:index');
        return $response;      
    }

    public function deleteAction($Id) {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository('SCMDIDMSBundle:Customer')->find($Id);

        if (!$customer) {
            throw $this->createNotFoundException('No customer found for id ' . $Id);
        }

        $em->remove($customer);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Deleted customer id ' . $Id);
        $this->get('session')->getFlashBag()->add('notice_type', 'success_message');
        $response = $this->forward('SCMDIDMSBundle:Customer:index');
        return $response;      
    }    
}