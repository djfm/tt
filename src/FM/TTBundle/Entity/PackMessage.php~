<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PackMessage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PackMessage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Pack", inversedBy="messages")
     */
    private $pack;

    /**
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Message", inversedBy="pack")
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
     * Set pack
     *
     * @param \FM\TTBundle\Entity\Pack $pack
     * @return PackMessage
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

    /**
     * Set message
     *
     * @param \FM\TTBundle\Entity\Message $message
     * @return PackMessage
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