<?php

namespace msql\facoopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * msql\facoopBundle\Entity\Institution
 */
class Institution
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $institution
     */
    private $institution;

    /**
     * @var string $nature
     */
    private $nature;

    /**
     * @var string $adresse
     */
    private $adresse;

    /**
     * @var string $pays
     */
    private $pays;


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
     * Set institution
     *
     * @param string $institution
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
    }

    /**
     * Get institution
     *
     * @return string 
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Set nature
     *
     * @param string $nature
     */
    public function setNature($nature)
    {
        $this->nature = $nature;
    }

    /**
     * Get nature
     *
     * @return string 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set pays
     *
     * @param string $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }
    
    public function __toString(){
    	return $this->institution;
    }
}