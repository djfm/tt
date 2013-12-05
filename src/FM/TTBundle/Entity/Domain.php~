<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domain
 *
 * @ORM\Table(name="Domain")
 * @ORM\Entity(repositoryClass="FM\TTBundle\Entity\DomainRepository")
 */
class Domain
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
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var \FM\TTBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Project", inversedBy="domains")
     */
    private $project;

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
     * @return Domain
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
     * Set project
     *
     * @param \FM\TTBundle\Entity\Project $project
     * @return Domain
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
}