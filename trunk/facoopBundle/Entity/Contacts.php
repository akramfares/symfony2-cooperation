<?php

namespace msql\facoopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * msql\facoopBundle\Entity\Contacts
 */
class Contacts
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nom
     */
    private $nom;

    /**
     * @var string $prenom
     */
    private $prenom;

    /**
     * @var string $fonction
     */
    private $fonction;

    /**
     * @var string $tel
     */
    private $tel;

    /**
     * @var string $fax
     */
    private $fax;

    /**
     * @var string $mail
     */
    private $mail;

    /**
     * @var msql\facoopBundle\Entity\Institution
     */
    private $institution;


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
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    /**
     * Get fonction
     *
     * @return string 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set tel
     *
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set institution
     *
     * @param msql\facoopBundle\Entity\Institution $institution
     */
    public function setInstitution(\msql\facoopBundle\Entity\Institution $institution)
    {
        $this->institution = $institution;
    }

    /**
     * Get institution
     *
     * @return msql\facoopBundle\Entity\Institution 
     */
    public function getInstitution()
    {
        return $this->institution;
    }
    
    public function __toString(){
    	return $this->nom.' '. $this->prenom;
    }
}