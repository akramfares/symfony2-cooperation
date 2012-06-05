<?php

namespace msql\facoopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * msql\facoopBundle\Entity\CooperationsHasDomaines
 */
class CooperationsHasDomaines
{
    /**
     * @var integer $cooperationsId
     */
    private $cooperationsId;

    /**
     * @var integer $domainesId
     */
    private $domainesId;


    /**
     * Set cooperationsId
     *
     * @param integer $cooperationsId
     */
    public function setCooperationsId($cooperationsId)
    {
        $this->cooperationsId = $cooperationsId;
    }

    /**
     * Get cooperationsId
     *
     * @return integer 
     */
    public function getCooperationsId()
    {
        return $this->cooperationsId;
    }

    /**
     * Set domainesId
     *
     * @param integer $domainesId
     */
    public function setDomainesId($domainesId)
    {
        $this->domainesId = $domainesId;
    }

    /**
     * Get domainesId
     *
     * @return integer 
     */
    public function getDomainesId()
    {
        return $this->domainesId;
    }
}