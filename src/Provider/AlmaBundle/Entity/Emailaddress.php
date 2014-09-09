<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emailaddress
 *
 * @ORM\Table(name="emailaddress", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="address", columns={"address"})})
 * @ORM\Entity
 */
class Emailaddress
{
    /**
     * @var integer
     *
     * @ORM\Column(name="patron", type="integer", nullable=false)
     */
    private $patron;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

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
     * @var string
     *
     * @ORM\Column(name="isActive", type="string", length=3, nullable=false)
     */
    private $isactive;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="emailaddresscol", type="string", length=45, nullable=false)
     */
    private $emailaddresscol;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;



    /**
     * Set patron
     *
     * @param integer $patron
     * @return Emailaddress
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
     * Set address
     *
     * @param string $address
     * @return Emailaddress
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set iseditable
     *
     * @param string $iseditable
     * @return Emailaddress
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
     * @return Emailaddress
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
     * Set isactive
     *
     * @param string $isactive
     * @return Emailaddress
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return string 
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Emailaddress
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set emailaddresscol
     *
     * @param string $emailaddresscol
     * @return Emailaddress
     */
    public function setEmailaddresscol($emailaddresscol)
    {
        $this->emailaddresscol = $emailaddresscol;

        return $this;
    }

    /**
     * Get emailaddresscol
     *
     * @return string 
     */
    public function getEmailaddresscol()
    {
        return $this->emailaddresscol;
    }

    /**
     * Get emailId
     *
     * @return integer 
     */
    public function getEmailId()
    {
        return $this->emailId;
    }
}
