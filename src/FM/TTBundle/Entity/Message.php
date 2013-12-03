<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="Message", indexes={
 *      @ORM\Index(name="message_identity_idx",
 *                 columns={"project_id", "domain_id", "context_id", "locale", "msgid", "msgid_plural"})  
 * })
 * @ORM\Entity(repositoryClass="FM\TTBundle\Entity\MessageRepository")
 */
class Message
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
     * @var string
     *
     * @ORM\Column(name="msgid", type="text", nullable=true)
     */
    private $msgid;

    /**
     * @var string
     *
     * @ORM\Column(name="msgid_plural", type="text", nullable=true)
     */
    private $msgidPlural;

    /**
     * @var \FM\TTBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Project")
     */
    private $project;

    /**
     * @var \FM\TTBundle\Entity\Domain
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Domain")
     */

    /**
     * @var \FM\TTBundle\Entity\Domain
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Domain")
     */
    private $domain;

    /**
     * @var \FM\TTBundle\Entity\Context
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Context")
     */
    private $context;

    /**
     * @ORM\OneToMany(targetEntity="FM\TTBundle\Entity\PackMessage", mappedBy="message")
     */
    private $packs;

    /**
     * @ORM\OneToMany(targetEntity="FM\TTBundle\Entity\MessageData", mappedBy="message")
     */
    private $data;

    public function __construct()
    {
        $this->packs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->data  = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set locale
     *
     * @param string $locale
     * @return Message
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
     * Set msgid
     *
     * @param string $msgid
     * @return Message
     */
    public function setMsgid($msgid)
    {
        $this->msgid = $msgid;
    
        return $this;
    }

    /**
     * Get msgid
     *
     * @return string 
     */
    public function getMsgid()
    {
        return $this->msgid;
    }

    /**
     * Set msgidPlural
     *
     * @param string $msgidPlural
     * @return Message
     */
    public function setMsgidPlural($msgidPlural)
    {
        $this->msgidPlural = $msgidPlural;
    
        return $this;
    }

    /**
     * Get msgidPlural
     *
     * @return string 
     */
    public function getMsgidPlural()
    {
        return $this->msgidPlural;
    }

    /**
     * Set project
     *
     * @param \FM\TTBundle\Entity\Project $project
     * @return Message
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
     * Set domain
     *
     * @param \FM\TTBundle\Entity\Domain $domain
     * @return Message
     */
    public function setDomain(\FM\TTBundle\Entity\Domain $domain = null)
    {
        $this->domain = $domain;
    
        return $this;
    }

    /**
     * Get domain
     *
     * @return \FM\TTBundle\Entity\Domain 
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set context
     *
     * @param \FM\TTBundle\Entity\Context $context
     * @return Message
     */
    public function setContext(\FM\TTBundle\Entity\Context $context = null)
    {
        $this->context = $context;
    
        return $this;
    }

    /**
     * Get context
     *
     * @return \FM\TTBundle\Entity\Context 
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Add packs
     *
     * @param \FM\TTBundle\Entity\PackMessage $packs
     * @return Message
     */
    public function addPack(\FM\TTBundle\Entity\PackMessage $packs)
    {
        $this->packs[] = $packs;
    
        return $this;
    }

    /**
     * Remove packs
     *
     * @param \FM\TTBundle\Entity\PackMessage $packs
     */
    public function removePack(\FM\TTBundle\Entity\PackMessage $packs)
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
     * Add data
     *
     * @param \FM\TTBundle\Entity\MessageData $data
     * @return Message
     */
    public function addData(\FM\TTBundle\Entity\MessageData $data)
    {
        $this->data[] = $data;
    
        return $this;
    }

    /**
     * Remove data
     *
     * @param \FM\TTBundle\Entity\MessageData $data
     */
    public function removeData(\FM\TTBundle\Entity\MessageData $data)
    {
        $this->data->removeElement($data);
    }

    /**
     * Get data
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getData()
    {
        return $this->data;
    }
}