<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Borrcard
 *
 * @ORM\Table(name="borrcard", indexes={@ORM\Index(name="cardNumber", columns={"cardNumber", "cardPin"})})
 * @ORM\Entity
 */
class Borrcard
{
    /**
     * @var string
     *
     * @ORM\Column(name="isValid", type="string", length=3, nullable=false)
     */
    private $isvalid;

    /**
     * @var string
     *
     * @ORM\Column(name="cardNumber", type="string", length=32, nullable=false)
     */
    private $cardnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cardPin", type="string", length=255, nullable=false)
     */
    private $cardpin;

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
     * @ORM\Column(name="borr_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $borrId;



    /**
     * Set isvalid
     *
     * @param string $isvalid
     * @return Borrcard
     */
    public function setIsvalid($isvalid)
    {
        $this->isvalid = $isvalid;

        return $this;
    }

    /**
     * Get isvalid
     *
     * @return string 
     */
    public function getIsvalid()
    {
        return $this->isvalid;
    }

    /**
     * Set cardnumber
     *
     * @param string $cardnumber
     * @return Borrcard
     */
    public function setCardnumber($cardnumber)
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }

    /**
     * Get cardnumber
     *
     * @return string 
     */
    public function getCardnumber()
    {
        return $this->cardnumber;
    }

    /**
     * Set cardpin
     *
     * @param string $cardpin
     * @return Borrcard
     */
    public function setCardpin($cardpin)
    {
        $this->cardpin = $cardpin;

        return $this;
    }

    /**
     * Get cardpin
     *
     * @return string 
     */
    public function getCardpin()
    {
        return $this->cardpin;
    }

    /**
     * Set iseditable
     *
     * @param string $iseditable
     * @return Borrcard
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
     * @return Borrcard
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
     * Get borrId
     *
     * @return integer 
     */
    public function getBorrId()
    {
        return $this->borrId;
    }
}
