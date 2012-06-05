<?php

namespace msql\facoopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * msql\facoopBundle\Entity\Domaines
 */
class Domaines
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $domaines
     */
    private $domaines;


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
     * Set domaines
     *
     * @param string $domaines
     */
    public function setDomaines($domaines)
    {
        $this->domaines = $domaines;
    }

    /**
     * Get domaines
     *
     * @return string 
     */
    public function getDomaines()
    {
        return $this->domaines;
    }
    
    public function __toString(){
    	return $this->domaines;
    }
    /**
     * @var msql\facoopBundle\Entity\Cooperations
     */
    private $cooperations;

    public function __construct()
    {
        $this->cooperations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add cooperations
     *
     * @param msql\facoopBundle\Entity\Cooperations $cooperations
     */
    public function addCooperations(\msql\facoopBundle\Entity\Cooperations $cooperations)
    {
        $this->cooperations[] = $cooperations;
    }

    /**
     * Get cooperations
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCooperations()
    {
        return $this->cooperations;
    }
}