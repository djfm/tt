<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 *
 * @ORM\Table(name="Pack")
 * @ORM\Entity(repositoryClass="FM\TTBundle\Entity\PackRepository")
 */
class Pack
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
     * @ORM\Column(name="name", type="string", length=256, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=64, nullable=true)
     */
    private $version;

    /**
     * @var \FM\TTBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Project", inversedBy="packs")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", nullable=false)
     * 
     */
    private $project;

    /**
     * @var \FM\TTBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="FM\TTBundle\Entity\PackMessage", mappedBy="pack")
     */
    private $messages;

    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Pack
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
     * Set version
     *
     * @param string $version
     * @return Pack
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set project
     *
     * @param \FM\TTBundle\Entity\Project $project
     * @return Pack
     */
    public function setProject(\FM\TTBundle\Entity\Project $project = null)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return \FM\TTBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return Pack
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
     * Add messages
     *
     * @param \FM\TTBundle\Entity\PackMessage $messages
     * @return Pack
     */
    public function addMessage(\FM\TTBundle\Entity\PackMessage $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \FM\TTBundle\Entity\PackMessage $messages
     */
    public function removeMessage(\FM\TTBundle\Entity\PackMessage $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}