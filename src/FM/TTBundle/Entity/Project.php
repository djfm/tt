<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="Project")
 * @ORM\Entity
 */
class Project
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
     * @var \FM\TTBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Pack", mappedBy="project")
     */
    private $packs;

    /**
     * @ORM\OneToMany(targetEntity="Context", mappedBy="project")
     */
    private $contexts;

    /**
     * @ORM\OneToMany(targetEntity="Domain", mappedBy="project")
     */
    private $domains;

    public function __construct()
    {
        $this->packs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contexts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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
     * @return Project
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
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return Project
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
     * Add packs
     *
     * @param \FM\TTBundle\Entity\Pack $packs
     * @return Project
     */
    public function addPack(\FM\TTBundle\Entity\Pack $packs)
    {
        $this->packs[] = $packs;
    
        return $this;
    }

    /**
     * Remove packs
     *
     * @param \FM\TTBundle\Entity\Pack $packs
     */
    public function removePack(\FM\TTBundle\Entity\Pack $packs)
    {
        $this->packs->removeElement($packs);
    }

    /**
     * Get packs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPacks()
    {
        return $this->packs;
    }

    /**
     * Add contexts
     *
     * @param \FM\TTBundle\Entity\Context $contexts
     * @return Project
     */
    public function addContext(\FM\TTBundle\Entity\Context $contexts)
    {
        $this->contexts[] = $contexts;
    
        return $this;
    }

    /**
     * Remove contexts
     *
     * @param \FM\TTBundle\Entity\Context $contexts
     */
    public function removeContext(\FM\TTBundle\Entity\Context $contexts)
    {
        $this->contexts->removeElement($contexts);
    }

    /**
     * Get contexts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContexts()
    {
        return $this->contexts;
    }

    /**
     * Add domains
     *
     * @param \FM\TTBundle\Entity\Domain $domains
     * @return Project
     */
    public function addDomain(\FM\TTBundle\Entity\Domain $domains)
    {
        $this->domains[] = $domains;
    
        return $this;
    }

    /**
     * Remove domains
     *
     * @param \FM\TTBundle\Entity\Domain $domains
     */
    public function removeDomain(\FM\TTBundle\Entity\Domain $domains)
    {
        $this->domains->removeElement($domains);
    }

    /**
     * Get domains
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomains()
    {
        return $this->domains;
    }
}