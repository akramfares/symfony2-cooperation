<?php

namespace msql\facoopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * msql\facoopBundle\Entity\Cooperations
 */
class Cooperations
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $objectifs
     */
    private $objectifs;

    /**
     * @var msql\facoopBundle\Entity\Contacts
     */
    private $contacts;


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
     * Set objectifs
     *
     * @param string $objectifs
     */
    public function setObjectifs($objectifs)
    {
        $this->objectifs = $objectifs;
    }

    /**
     * Get objectifs
     *
     * @return string 
     */
    public function getObjectifs()
    {
        return $this->objectifs;
    }

    /**
     * Set contacts
     *
     * @param msql\facoopBundle\Entity\Contacts $contacts
     */
    public function setContacts(\msql\facoopBundle\Entity\Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Get contacts
     *
     * @return msql\facoopBundle\Entity\Contacts 
     */
    public function getContacts()
    {
        return $this->contacts;
    }
    public function __toString(){
    	return $this->id;
    }
    /**
     * @var msql\facoopBundle\Entity\Domaines
     */
    private $domaines;

    public function __construct()
    {
        $this->domaines = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add domaines
     *
     * @param msql\facoopBundle\Entity\Domaines $domaines
     */
    public function addDomaines(\msql\facoopBundle\Entity\Domaines $domaines)
    {
        $this->domaines[] = $domaines;
    }

    /**
     * Get domaines
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDomaines()
    {
        return $this->domaines;
    }
}