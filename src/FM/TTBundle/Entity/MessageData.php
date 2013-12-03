<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagedata
 *
 * @ORM\Table(name="MessageData")
 * @ORM\Entity
 */
class MessageData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dkey", type="string", length=64, nullable=false)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=false)
     */
    private $value;

    /**
     * @var \FM\TTBundle\Entity\Message
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Message")
     * @ORM\JoinColumn(name="message_id", referencedColumnName="id", nullable=false)
     */
    private $message;

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
}