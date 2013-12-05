<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mapping
 *
 * @ORM\Table(name="Mapping")
 * @ORM\Entity(repositoryClass="FM\TTBundle\Entity\MappingRepository")
 */
class Mapping
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
     * @var \FM\TTBundle\Entity\Message
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Message")
     */
    private $message;
    /**
     * @var integer
     *
     * @ORM\Column(name="message_id", type="integer", nullable=false)
     */
    private $message_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="plurality", type="integer", nullable=false)
     */
    private $plurality;

    /**
     * @var \FM\TTBundle\Entity\Translation
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Translation", inversedBy="mappings")
     */
    private $translation;
    /**
     * @var integer
     *
     * @ORM\Column(name="translation_id", type="integer", nullable=false)
     */
    private $translation_id;

    /**
     * @var \FM\TTBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="MappingComment", mappedBy="mapping")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="MappingFlag", mappedBy="mapping")
     */
    private $flags;

    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flags = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set message
     *
     * @param \FM\TTBundle\Entity\Message $message
     * @return Mapping
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
     * Set translation
     *
     * @param \FM\TTBundle\Entity\Translation $translation
     * @return Mapping
     */
    public function setTranslation(\FM\TTBundle\Entity\Translation $translation = null)
    {
        $this->translation = $translation;
    
        return $this;
    }

    /**
     * Get translation
     *
     * @return \FM\TTBundle\Entity\Translation 
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return Mapping
     */
    public function setUser(\FM\TTBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \FM\TTBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add comments
     *
     * @param \FM\TTBundle\Entity\MappingComment $comments
     * @return Mapping
     */
    public function addComment(\FM\TTBundle\Entity\MappingComment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \FM\TTBundle\Entity\MappingComment $comments
     */
    public function removeComment(\FM\TTBundle\Entity\MappingComment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add flags
     *
     * @param \FM\TTBundle\Entity\MappingFlag $flags
     * @return Mapping
     */
    public function addFlag(\FM\TTBundle\Entity\MappingFlag $flags)
    {
        $this->flags[] = $flags;
    
        return $this;
    }

    /**
     * Remove flags
     *
     * @param \FM\TTBundle\Entity\MappingFlag $flags
     */
    public function removeFlag(\FM\TTBundle\Entity\MappingFlag $flags)
    {
        $this->flags->removeElement($flags);
    }

    /**
     * Get flags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set plurality
     *
     * @param integer $plurality
     * @return Mapping
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