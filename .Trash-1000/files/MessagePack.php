<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessagePack
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MessagePack
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="message_id", type="integer")
     */
    private $messageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pack_id", type="integer")
     */
    private $packId;


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
     * Set messageId
     *
     * @param integer $messageId
     * @return MessagePack
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    
        return $this;
    }

    /**
     * Get messageId
     *
     * @return integer 
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set packId
     *
     * @param integer $packId
     * @return MessagePack
     */
    public function setPackId($packId)
    {
        $this->packId = $packId;
    
        return $this;
    }

    /**
     * Get packId
     *
     * @return integer 
     */
    public function getPackId()
    {
        return $this->packId;
    }
}