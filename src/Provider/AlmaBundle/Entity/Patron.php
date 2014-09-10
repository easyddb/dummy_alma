<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patron
 *
 * @ORM\Table(name="patron", uniqueConstraints={@ORM\UniqueConstraint(name="patronId", columns={"patronId"})}, indexes={@ORM\Index(name="patronName", columns={"patronName", "patronId", "borrCard"}), @ORM\Index(name="fk_patron_address_idx", columns={"address"}), @ORM\Index(name="fk_patron_borrcard_idx", columns={"borrCard"}), @ORM\Index(name="fk_patron_email_idx", columns={"emailAddress"}), @ORM\Index(name="fk_patron_phone_idx", columns={"phoneNumber"}), @ORM\Index(name="fk_patron_branch_idx", columns={"patronBranch"})})
 * @ORM\Entity(repositoryClass="Provider\AlmaBundle\Entity\PatronRepository")
 */
class Patron
{
    /**
     * @var integer
     *
     * @ORM\Column(name="patronCategory", type="integer", nullable=false)
     */
    private $patroncategory;

    /**
     * @var string
     *
     * @ORM\Column(name="patronName", type="string", length=64, nullable=false)
     */
    private $patronname;

    /**
     * @var string
     *
     * @ORM\Column(name="patronId", type="string", length=64, nullable=false)
     */
    private $patronid;

    /**
     * @var string
     *
     * @ORM\Column(name="addressesIsAddable", type="string", length=3, nullable=false)
     */
    private $addressesisaddable;

    /**
     * @var string
     *
     * @ORM\Column(name="borrCardsIsAddable", type="string", length=3, nullable=false)
     */
    private $borrcardsisaddable;

    /**
     * @var string
     *
     * @ORM\Column(name="emailAddressesIsAddable", type="string", length=3, nullable=false)
     */
    private $emailaddressesisaddable;

    /**
     * @var string
     *
     * @ORM\Column(name="messageServicesIsAddable", type="string", length=3, nullable=false)
     */
    private $messageservicesisaddable;

    /**
     * @var integer
     *
     * @ORM\Column(name="messageServices", type="integer", nullable=true)
     */
    private $messageservices;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumbersIsAddable", type="string", length=3, nullable=false)
     */
    private $phonenumbersisaddable;

    /**
     * @var integer
     *
     * @ORM\Column(name="patronBlocks", type="integer", nullable=true)
     */
    private $patronblocks;

    /**
     * @var string
     *
     * @ORM\Column(name="absentToDate", type="string", length=10, nullable=true)
     */
    private $absenttodate;

    /**
     * @var string
     *
     * @ORM\Column(name="absentFromDate", type="string", length=10, nullable=true)
     */
    private $absentfromdate;

    /**
     * @var string
     *
     * @ORM\Column(name="absentId", type="string", length=16, nullable=true)
     */
    private $absentid;

    /**
     * @var integer
     *
     * @ORM\Column(name="patr_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $patrId;

    /**
     * @var \Provider\AlmaBundle\Entity\Phonenumber
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Phonenumber")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phoneNumber", referencedColumnName="phone_id")
     * })
     */
    private $phonenumber;

    /**
     * @var \Provider\AlmaBundle\Entity\Emailaddress
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Emailaddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="emailAddress", referencedColumnName="email_id")
     * })
     */
    private $emailaddress;

    /**
     * @var \Provider\AlmaBundle\Entity\Borrcard
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Borrcard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrCard", referencedColumnName="borr_id")
     * })
     */
    private $borrcard;

    /**
     * @var \Provider\AlmaBundle\Entity\Address
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="addr_id")
     * })
     */
    private $address;

    /**
     * @var \Provider\AlmaBundle\Entity\Branches
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Branches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patronBranch", referencedColumnName="bra_id")
     * })
     */
    private $patronbranch;



    /**
     * Set patroncategory
     *
     * @param integer $patroncategory
     * @return Patron
     */
    public function setPatroncategory($patroncategory)
    {
        $this->patroncategory = $patroncategory;

        return $this;
    }

    /**
     * Get patroncategory
     *
     * @return integer
     */
    public function getPatroncategory()
    {
        return $this->patroncategory;
    }

    /**
     * Set patronname
     *
     * @param string $patronname
     * @return Patron
     */
    public function setPatronname($patronname)
    {
        $this->patronname = $patronname;

        return $this;
    }

    /**
     * Get patronname
     *
     * @return string
     */
    public function getPatronname()
    {
        return $this->patronname;
    }

    /**
     * Set patronid
     *
     * @param string $patronid
     * @return Patron
     */
    public function setPatronid($patronid)
    {
        $this->patronid = $patronid;

        return $this;
    }

    /**
     * Get patronid
     *
     * @return string
     */
    public function getPatronid()
    {
        return $this->patronid;
    }

    /**
     * Set addressesisaddable
     *
     * @param string $addressesisaddable
     * @return Patron
     */
    public function setAddressesisaddable($addressesisaddable)
    {
        $this->addressesisaddable = $addressesisaddable;

        return $this;
    }

    /**
     * Get addressesisaddable
     *
     * @return string
     */
    public function getAddressesisaddable()
    {
        return $this->addressesisaddable;
    }

    /**
     * Set borrcardsisaddable
     *
     * @param string $borrcardsisaddable
     * @return Patron
     */
    public function setBorrcardsisaddable($borrcardsisaddable)
    {
        $this->borrcardsisaddable = $borrcardsisaddable;

        return $this;
    }

    /**
     * Get borrcardsisaddable
     *
     * @return string
     */
    public function getBorrcardsisaddable()
    {
        return $this->borrcardsisaddable;
    }

    /**
     * Set emailaddressesisaddable
     *
     * @param string $emailaddressesisaddable
     * @return Patron
     */
    public function setEmailaddressesisaddable($emailaddressesisaddable)
    {
        $this->emailaddressesisaddable = $emailaddressesisaddable;

        return $this;
    }

    /**
     * Get emailaddressesisaddable
     *
     * @return string
     */
    public function getEmailaddressesisaddable()
    {
        return $this->emailaddressesisaddable;
    }

    /**
     * Set messageservicesisaddable
     *
     * @param string $messageservicesisaddable
     * @return Patron
     */
    public function setMessageservicesisaddable($messageservicesisaddable)
    {
        $this->messageservicesisaddable = $messageservicesisaddable;

        return $this;
    }

    /**
     * Get messageservicesisaddable
     *
     * @return string
     */
    public function getMessageservicesisaddable()
    {
        return $this->messageservicesisaddable;
    }

    /**
     * Set messageservices
     *
     * @param integer $messageservices
     * @return Patron
     */
    public function setMessageservices($messageservices)
    {
        $this->messageservices = $messageservices;

        return $this;
    }

    /**
     * Get messageservices
     *
     * @return integer
     */
    public function getMessageservices()
    {
        return $this->messageservices;
    }

    /**
     * Set phonenumbersisaddable
     *
     * @param string $phonenumbersisaddable
     * @return Patron
     */
    public function setPhonenumbersisaddable($phonenumbersisaddable)
    {
        $this->phonenumbersisaddable = $phonenumbersisaddable;

        return $this;
    }

    /**
     * Get phonenumbersisaddable
     *
     * @return string
     */
    public function getPhonenumbersisaddable()
    {
        return $this->phonenumbersisaddable;
    }

    /**
     * Set patronblocks
     *
     * @param integer $patronblocks
     * @return Patron
     */
    public function setPatronblocks($patronblocks)
    {
        $this->patronblocks = $patronblocks;

        return $this;
    }

    /**
     * Get patronblocks
     *
     * @return integer
     */
    public function getPatronblocks()
    {
        return $this->patronblocks;
    }

    /**
     * Set absenttodate
     *
     * @param string $absenttodate
     * @return Patron
     */
    public function setAbsenttodate($absenttodate)
    {
        $this->absenttodate = $absenttodate;

        return $this;
    }

    /**
     * Get absenttodate
     *
     * @return string
     */
    public function getAbsenttodate()
    {
        return $this->absenttodate;
    }

    /**
     * Set absentfromdate
     *
     * @param string $absentfromdate
     * @return Patron
     */
    public function setAbsentfromdate($absentfromdate)
    {
        $this->absentfromdate = $absentfromdate;

        return $this;
    }

    /**
     * Get absentfromdate
     *
     * @return string
     */
    public function getAbsentfromdate()
    {
        return $this->absentfromdate;
    }

    /**
     * Set absentid
     *
     * @param string $absentid
     * @return Patron
     */
    public function setAbsentid($absentid)
    {
        $this->absentid = $absentid;

        return $this;
    }

    /**
     * Get absentid
     *
     * @return string
     */
    public function getAbsentid()
    {
        return $this->absentid;
    }

    /**
     * Get patrId
     *
     * @return integer
     */
    public function getPatrId()
    {
        return $this->patrId;
    }

    /**
     * Set phonenumber
     *
     * @param \Provider\AlmaBundle\Entity\Phonenumber $phonenumber
     * @return Patron
     */
    public function setPhonenumber(\Provider\AlmaBundle\Entity\Phonenumber $phonenumber = null)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return \Provider\AlmaBundle\Entity\Phonenumber
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set emailaddress
     *
     * @param \Provider\AlmaBundle\Entity\Emailaddress $emailaddress
     * @return Patron
     */
    public function setEmailaddress(\Provider\AlmaBundle\Entity\Emailaddress $emailaddress = null)
    {
        $this->emailaddress = $emailaddress;

        return $this;
    }

    /**
     * Get emailaddress
     *
     * @return \Provider\AlmaBundle\Entity\Emailaddress
     */
    public function getEmailaddress()
    {
        return $this->emailaddress;
    }

    /**
     * Set borrcard
     *
     * @param \Provider\AlmaBundle\Entity\Borrcard $borrcard
     * @return Patron
     */
    public function setBorrcard(\Provider\AlmaBundle\Entity\Borrcard $borrcard = null)
    {
        $this->borrcard = $borrcard;

        return $this;
    }

    /**
     * Get borrcard
     *
     * @return \Provider\AlmaBundle\Entity\Borrcard
     */
    public function getBorrcard()
    {
        return $this->borrcard;
    }

    /**
     * Set address
     *
     * @param \Provider\AlmaBundle\Entity\Address $address
     * @return Patron
     */
    public function setAddress(\Provider\AlmaBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Provider\AlmaBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set patronbranch
     *
     * @param \Provider\AlmaBundle\Entity\Branches $patronbranch
     * @return Patron
     */
    public function setPatronbranch(\Provider\AlmaBundle\Entity\Branches $patronbranch = null)
    {
        $this->patronbranch = $patronbranch;

        return $this;
    }

    /**
     * Get patronbranch
     *
     * @return \Provider\AlmaBundle\Entity\Branches
     */
    public function getPatronbranch()
    {
        return $this->patronbranch;
    }
}
