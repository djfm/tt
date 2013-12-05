<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currentmapping
 *
 * @ORM\Table(name="CurrentMapping")
 * @ORM\Entity(repositoryClass="CurrentMappingRepository")
 */
class CurrentMapping
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
     * @ORM\Column(name="locale", type="string", length=64, nullable=true)
     */
    private $locale;

    /**
     * @var \FM\TTBundle\Entity\Message
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Message")
     */
    private $message;

    /**
     * @var integer
     * @ORM\Column(name="plurality", type="integer", nullable=false)
     */
    private $plurality;

    /**
     * @var \FM\TTBundle\Entity\Mapping
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Mapping")
     */
    private $mapping;



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
     * Set locale
     *
     * @param string $locale
     * @return Currentmapping
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set message
     *
     * @param \FM\TTBundle\Entity\Message $message
     * @return Currentmapping
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
     * Set mapping
     *
     * @param \FM\TTBundle\Entity\Mapping $mapping
     * @return Currentmapping
     */
    public function setMapping(\FM\TTBundle\Entity\Mapping $mapping = null)
    {
        $this->mapping = $mapping;
    
        return $this;
    }

    /**
     * Get mapping
     *
     * @return \FM\TTBundle\Entity\Mapping 
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * Set plurality
     *
     * @param integer $plurality
     * @return CurrentMapping
     */
    public function setPlurality($plurality)
    {
        $this->plurality = $plurality;
    
        return $this;
    }

    /**
     * Get plurality
     *
     * @return integer 
     */
    public function getPlurality()
    {
        return $this->plurality;
    }
}