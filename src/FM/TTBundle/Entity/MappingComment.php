<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MappingComment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FM\TTBundle\Entity\MappingCommentRepository")
 */
class MappingComment
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
     * @ORM\Column(name="mapping_id", type="integer")
     */
    private $mappingId;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="mappingComments")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Mapping", inversedBy="comments")
     */
    private $mapping;

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
     * @return MappingComment
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
     * Set mapping
     *
     * @param \FM\TTBundle\Entity\Mapping $mapping
     * @return MappingComment
     */
    public function setMapping(\FM\TTBundle\Entity\Mapping $mapping = null)
    {
        $this->mapping = $mapping;
    
        return $this;
    }

    /**
     * Get mapping
     *
     * @return \FM\TTBundle\Entity\Mapping 
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * Set mappingId
     *
     * @param integer $mappingId
     * @return MappingComment
     */
    public function setMappingId($mappingId)
    {
        $this->mappingId = $mappingId;
    
        return $this;
    }

    /**
     * Get mappingId
     *
     * @return integer 
     */
    public function getMappingId()
    {
        return $this->mappingId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return MappingComment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set user
     *
     * @param \FM\TTBundle\Entity\User $user
     * @return MappingComment
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