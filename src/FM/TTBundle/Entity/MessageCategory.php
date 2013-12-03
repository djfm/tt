<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagecategory
 *
 * @ORM\Table(name="MessageCategory")
 * @ORM\Entity
 */
class MessageCategory
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
     * @ORM\Column(name="name", type="string", length=64, nullable=true)
     */
    private $name;

    /**
     * @var \FM\TTBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \FM\TTBundle\Entity\Messagecategory
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Messagecategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;



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
     * @return Messagecategory
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
     * @return Messagecategory
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
     * Set parent
     *
     * @param \FM\TTBundle\Entity\Messagecategory $parent
     * @return Messagecategory
     */
    public function setParent(\FM\TTBundle\Entity\Messagecategory $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \FM\TTBundle\Entity\Messagecategory 
     */
    public function getParent()
    {
        return $this->parent;
    }
}