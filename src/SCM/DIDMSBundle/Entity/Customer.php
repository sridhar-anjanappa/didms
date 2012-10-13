<?php

namespace SCM\DIDMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SCM\StoreBundle\Entity\Customer
 */
class Customer
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $phone
     */
    private $phone;

    /**
     * @var boolean $smsenabled
     */
    private $smsenabled;

    /**
     * @var string $forwardingto
     */
    private $forwardingto;

    /**
     * @var string $orderid
     */
    private $orderid;

    /**
     * @var string $comment
     */
    private $comment;

    /**
     * @var integer $id
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set smsenabled
     *
     * @param boolean $smsenabled
     * @return Customer
     */
    public function setSmsenabled($smsenabled)
    {
        $this->smsenabled = $smsenabled;
    
        return $this;
    }

    /**
     * Get smsenabled
     *
     * @return boolean 
     */
    public function getSmsenabled()
    {
        return $this->smsenabled;
    }

    /**
     * Set forwardingto
     *
     * @param string $forwardingto
     * @return Customer
     */
    public function setForwardingto($forwardingto)
    {
        $this->forwardingto = $forwardingto;
    
        return $this;
    }

    /**
     * Get forwardingto
     *
     * @return string 
     */
    public function getForwardingto()
    {
        return $this->forwardingto;
    }

    /**
     * Set orderid
     *
     * @param string $orderid
     * @return Customer
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
    
        return $this;
    }

    /**
     * Get orderid
     *
     * @return string 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Customer
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
