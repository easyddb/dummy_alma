<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="zipCode", type="integer", nullable=false)
     */
    private $zipcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="streetAddress", type="string", length=255, nullable=false)
     */
    private $streetaddress;

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
     * @ORM\Column(name="country", type="string", length=255, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="careOf", type="string", length=255, nullable=false)
     */
    private $careof;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="addr_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addrId;



    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return Address
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Address
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set streetaddress
     *
     * @param string $streetaddress
     * @return Address
     */
    public function setStreetaddress($streetaddress)
    {
        $this->streetaddress = $streetaddress;

        return $this;
    }

    /**
     * Get streetaddress
     *
     * @return string 
     */
    public function getStreetaddress()
    {
        return $this->streetaddress;
    }

    /**
     * Set iseditable
     *
     * @param string $iseditable
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * Set country
     *
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set careof
     *
     * @param string $careof
     * @return Address
     */
    public function setCareof($careof)
    {
        $this->careof = $careof;

        return $this;
    }

    /**
     * Get careof
     *
     * @return string 
     */
    public function getCareof()
    {
        return $this->careof;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Address
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
     * Get addrId
     *
     * @return integer 
     */
    public function getAddrId()
    {
        return $this->addrId;
    }
}
