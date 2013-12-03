<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messagecomment
 */
class Messagecomment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \FM\TTBundle\Entity\Message
     */
    private $message;

    /**
     * @var \FM\TTBundle\Entity\User
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
     * Set comment
     *
     * @param string $comment
     * @return Messagecomment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set message
     *
     * @param \FM\TTBundle\Entity\Message $message
     * @return Messagecomment
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
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return Messagecomment
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
