<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagedata
 */
class Messagedata
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \FM\TTBundle\Entity\Message
     */
    private $message;

    /**
     * @var \FM\TTBundle\Entity\Pack
     */
    private $pack;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return Messagedata
     */
    public function setKey($key)
    {
        $this->key = $key;
    
        return $this;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Messagedata
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set message
     *
     * @param \FM\TTBundle\Entity\Message $message
     * @return Messagedata
     */
    public function setMessage(\FM\TTBundle\Entity\Message $message = null)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return \FM\TTBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set pack
     *
     * @param \FM\TTBundle\Entity\Pack $pack
     * @return Messagedata
     */
    public function setPack(\FM\TTBundle\Entity\Pack $pack = null)
    {
        $this->pack = $pack;
    
        return $this;
    }

    /**
     * Get pack
     *
     * @return \FM\TTBundle\Entity\Pack 
     */
    public function getPack()
    {
        return $this->pack;
    }
}
