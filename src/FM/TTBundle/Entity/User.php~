<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="MappingComment", mappedBy="user")
     */
    protected $mappingComments;

    public function __construct()
    {
        parent::__construct();

        $this->mappingComments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add mappingComments
     *
     * @param \FM\TTBundle\Entity\MappingComment $mappingComments
     * @return User
     */
    public function addMappingComment(\FM\TTBundle\Entity\MappingComment $mappingComments)
    {
        $this->mappingComments[] = $mappingComments;
    
        return $this;
    }

    /**
     * Remove mappingComments
     *
     * @param \FM\TTBundle\Entity\MappingComment $mappingComments
     */
    public function removeMappingComment(\FM\TTBundle\Entity\MappingComment $mappingComments)
    {
        $this->mappingComments->removeElement($mappingComments);
    }

    /**
     * Get mappingComments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMappingComments()
    {
        return $this->mappingComments;
    }
}