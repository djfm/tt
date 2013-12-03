<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagecategorization
 *
 * @ORM\Table(name="MessageCategorization")
 * @ORM\Entity
 */
class MessageCategorization
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
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     * })
     */
    private $message;

    /**
     * @var \FM\TTBundle\Entity\Messagecategory
     *
     * @ORM\ManyToOne(targetEntity="FM\TTBundle\Entity\Messagecategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



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
     * @return Messagecategorization
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
     * Set category
     *
     * @param \FM\TTBundle\Entity\Messagecategory $category
     * @return Messagecategorization
     */
    public function setCategory(\FM\TTBundle\Entity\Messagecategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \FM\TTBundle\Entity\Messagecategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}