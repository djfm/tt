<?php

namespace FM\TTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MappingFlag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MappingFlag
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
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=64)
     */
    private $flag;

    /**
     * @ORM\ManyToOne(targetEntity="Mapping", inversedBy="flags")
     * @ORM\JoinColumn(name="mapping_id", referencedColumnName="id", nullable=false)
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
     * Set flag
     *
     * @param string $flag
     * @return MappingFlag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    
        return $this;
    }

    /**
     * Get flag
     *
     * @return string 
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set mapping
     *
     * @param \FM\TTBundle\Entity\Mapping $mapping
     * @return MappingFlag
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
}