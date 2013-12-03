<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translation
 *
 * @ORM\Table(name="Translation", indexes={@ORM\Index(name="TranslationIdAndPlurality", columns={"id", "plurality"})})
 * @ORM\Entity
 */
class Translation
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
     * @ORM\Column(name="locale", type="string", length=64, nullable=false)
     */
    private $locale;

    /**
     * @var integer
     *
     * @ORM\Column(name="plurality", type="integer", nullable=false)
     */
    private $plurality;

    /**
     * @var string
     *
     * @ORM\Column(name="msgstr", type="text", nullable=true)
     */
    private $msgstr;

    /**
     * @var \FM\TTBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * @return Translation
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
     * Set plurality
     *
     * @param integer $plurality
     * @return Translation
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

    /**
     * Set msgstr
     *
     * @param string $msgstr
     * @return Translation
     */
    public function setMsgstr($msgstr)
    {
        $this->msgstr = $msgstr;
    
        return $this;
    }

    /**
     * Get msgstr
     *
     * @return string 
     */
    public function getMsgstr()
    {
        return $this->msgstr;
    }

    /**
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return Translation
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
}