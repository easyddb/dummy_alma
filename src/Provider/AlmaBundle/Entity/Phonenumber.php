<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phonenumber
 *
 * @ORM\Table(name="phonenumber", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="localCode", columns={"localCode"})})
 * @ORM\Entity
 */
class Phonenumber
{
    /**
     * @var integer
     *
     * @ORM\Column(name="patron", type="integer", nullable=false)
     */
    private $patron;

    /**
     * @var integer
     *
     * @ORM\Column(name="localCode", type="integer", nullable=false)
     */
    private $localcode;

    /**
     * @var string
     *
     * @ORM\Column(name="showArea", type="string", length=3, nullable=false)
     */
    private $showarea;

    /**
     * @var string
     *
     * @ORM\Column(name="showCountry", type="string", length=3, nullable=false)
     */
    private $showcountry;

    /**
     * @var string
     *
     * @ORM\Column(name="isEditable", type="string", length=3, nullable=false)
     */
    private $iseditable;

    /**
     * @var string
     *
     * @ORM\Column(name="isDeletable", type="string", length=3, nullable=false)
     */
    private $isdeletable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="useForSms", type="string", length=3, nullable=false)
     */
    private $useforsms;

    /**
     * @var string
     *
     * @ORM\Column(name="isEditableSms", type="string", length=3, nullable=false)
     */
    private $iseditablesms;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phoneId;



    /**
     * Set patron
     *
     * @param integer $patron
     * @return Phonenumber
     */
    public function setPatron($patron)
    {
        $this->patron = $patron;

        return $this;
    }

    /**
     * Get patron
     *
     * @return integer 
     */
    public function getPatron()
    {
        return $this->patron;
    }

    /**
     * Set localcode
     *
     * @param integer $localcode
     * @return Phonenumber
     */
    public function setLocalcode($localcode)
    {
        $this->localcode = $localcode;

        return $this;
    }

    /**
     * Get localcode
     *
     * @return integer 
     */
    public function getLocalcode()
    {
        return $this->localcode;
    }

    /**
     * Set showarea
     *
     * @param string $showarea
     * @return Phonenumber
     */
    public function setShowarea($showarea)
    {
        $this->showarea = $showarea;

        return $this;
    }

    /**
     * Get showarea
     *
     * @return string 
     */
    public function getShowarea()
    {
        return $this->showarea;
    }

    /**
     * Set showcountry
     *
     * @param string $showcountry
     * @return Phonenumber
     */
    public function setShowcountry($showcountry)
    {
        $this->showcountry = $showcountry;

        return $this;
    }

    /**
     * Get showcountry
     *
     * @return string 
     */
    public function getShowcountry()
    {
        return $this->showcountry;
    }

    /**
     * Set iseditable
     *
     * @param string $iseditable
     * @return Phonenumber
     */
    public function setIseditable($iseditable)
    {
        $this->iseditable = $iseditable;

        return $this;
    }

    /**
     * Get iseditable
     *
     * @return string 
     */
    public function getIseditable()
    {
        return $this->iseditable;
    }

    /**
     * Set isdeletable
     *
     * @param string $isdeletable
     * @return Phonenumber
     */
    public function setIsdeletable($isdeletable)
    {
        $this->isdeletable = $isdeletable;

        return $this;
    }

    /**
     * Get isdeletable
     *
     * @return string 
     */
    public function getIsdeletable()
    {
        return $this->isdeletable;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Phonenumber
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set useforsms
     *
     * @param string $useforsms
     * @return Phonenumber
     */
    public function setUseforsms($useforsms)
    {
        $this->useforsms = $useforsms;

        return $this;
    }

    /**
     * Get useforsms
     *
     * @return string 
     */
    public function getUseforsms()
    {
        return $this->useforsms;
    }

    /**
     * Set iseditablesms
     *
     * @param string $iseditablesms
     * @return Phonenumber
     */
    public function setIseditablesms($iseditablesms)
    {
        $this->iseditablesms = $iseditablesms;

        return $this;
    }

    /**
     * Get iseditablesms
     *
     * @return string 
     */
    public function getIseditablesms()
    {
        return $this->iseditablesms;
    }

    /**
     * Get phoneId
     *
     * @return integer 
     */
    public function getPhoneId()
    {
        return $this->phoneId;
    }
}
