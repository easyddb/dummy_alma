<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="catalogueRecordId", columns={"catalogueRecordId"}), @ORM\Index(name="fk_res_patron_idx", columns={"patron"}), @ORM\Index(name="fk_res_branch_idx", columns={"reservationPickUpBranch"}), @ORM\Index(name="fk_res_organisation_idx", columns={"organisation"})})
 * @ORM\Entity
 */
class Reservations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="validToDate", type="integer", nullable=false)
     */
    private $validtodate;

    /**
     * @var integer
     *
     * @ORM\Column(name="validFromDate", type="integer", nullable=false)
     */
    private $validfromdate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=32, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="reservationType", type="string", length=32, nullable=false)
     */
    private $reservationtype;

    /**
     * @var integer
     *
     * @ORM\Column(name="queueNo", type="integer", nullable=true)
     */
    private $queueno;

    /**
     * @var string
     *
     * @ORM\Column(name="isEditable", type="string", length=32, nullable=false)
     */
    private $iseditable;

    /**
     * @var string
     *
     * @ORM\Column(name="isDeletable", type="string", length=32, nullable=false)
     */
    private $isdeletable;

    /**
     * @var integer
     *
     * @ORM\Column(name="createDate", type="integer", nullable=false)
     */
    private $createdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="catalogueRecordId", type="string", length=32, nullable=false)
     */
    private $cataloguerecordid;

    /**
     * @var string
     *
     * @ORM\Column(name="reservationStatusKey", type="string", length=32, nullable=false)
     */
    private $reservationstatuskey;

    /**
     * @var string
     *
     * @ORM\Column(name="reservationStatusValue", type="string", length=32, nullable=false)
     */
    private $reservationstatusvalue;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="pickUpNo", type="integer", nullable=true)
     */
    private $pickupno;

    /**
     * @var integer
     *
     * @ORM\Column(name="pickUpExpireDate", type="integer", nullable=true)
     */
    private $pickupexpiredate;

    /**
     * @var integer
     *
     * @ORM\Column(name="reser_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reserId;

    /**
     * @var \Provider\AlmaBundle\Entity\Patron
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Patron")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patron", referencedColumnName="patr_id")
     * })
     */
    private $patron;

    /**
     * @var \Provider\AlmaBundle\Entity\Organisations
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Organisations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisation", referencedColumnName="org_id")
     * })
     */
    private $organisation;

    /**
     * @var \Provider\AlmaBundle\Entity\Branches
     *
     * @ORM\ManyToOne(targetEntity="Provider\AlmaBundle\Entity\Branches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservationPickUpBranch", referencedColumnName="bra_id")
     * })
     */
    private $reservationpickupbranch;



    /**
     * Set validtodate
     *
     * @param integer $validtodate
     * @return Reservations
     */
    public function setValidtodate($validtodate)
    {
        $this->validtodate = $validtodate;

        return $this;
    }

    /**
     * Get validtodate
     *
     * @return integer 
     */
    public function getValidtodate()
    {
        return $this->validtodate;
    }

    /**
     * Set validfromdate
     *
     * @param integer $validfromdate
     * @return Reservations
     */
    public function setValidfromdate($validfromdate)
    {
        $this->validfromdate = $validfromdate;

        return $this;
    }

    /**
     * Get validfromdate
     *
     * @return integer 
     */
    public function getValidfromdate()
    {
        return $this->validfromdate;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Reservations
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set reservationtype
     *
     * @param string $reservationtype
     * @return Reservations
     */
    public function setReservationtype($reservationtype)
    {
        $this->reservationtype = $reservationtype;

        return $this;
    }

    /**
     * Get reservationtype
     *
     * @return string 
     */
    public function getReservationtype()
    {
        return $this->reservationtype;
    }

    /**
     * Set queueno
     *
     * @param integer $queueno
     * @return Reservations
     */
    public function setQueueno($queueno)
    {
        $this->queueno = $queueno;

        return $this;
    }

    /**
     * Get queueno
     *
     * @return integer 
     */
    public function getQueueno()
    {
        return $this->queueno;
    }

    /**
     * Set iseditable
     *
     * @param string $iseditable
     * @return Reservations
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
     * @return Reservations
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
     * Set createdate
     *
     * @param integer $createdate
     * @return Reservations
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }

    /**
     * Get createdate
     *
     * @return integer 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Reservations
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
     * Set cataloguerecordid
     *
     * @param string $cataloguerecordid
     * @return Reservations
     */
    public function setCataloguerecordid($cataloguerecordid)
    {
        $this->cataloguerecordid = $cataloguerecordid;

        return $this;
    }

    /**
     * Get cataloguerecordid
     *
     * @return string 
     */
    public function getCataloguerecordid()
    {
        return $this->cataloguerecordid;
    }

    /**
     * Set reservationstatuskey
     *
     * @param string $reservationstatuskey
     * @return Reservations
     */
    public function setReservationstatuskey($reservationstatuskey)
    {
        $this->reservationstatuskey = $reservationstatuskey;

        return $this;
    }

    /**
     * Get reservationstatuskey
     *
     * @return string 
     */
    public function getReservationstatuskey()
    {
        return $this->reservationstatuskey;
    }

    /**
     * Set reservationstatusvalue
     *
     * @param string $reservationstatusvalue
     * @return Reservations
     */
    public function setReservationstatusvalue($reservationstatusvalue)
    {
        $this->reservationstatusvalue = $reservationstatusvalue;

        return $this;
    }

    /**
     * Get reservationstatusvalue
     *
     * @return string 
     */
    public function getReservationstatusvalue()
    {
        return $this->reservationstatusvalue;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Reservations
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set pickupno
     *
     * @param integer $pickupno
     * @return Reservations
     */
    public function setPickupno($pickupno)
    {
        $this->pickupno = $pickupno;

        return $this;
    }

    /**
     * Get pickupno
     *
     * @return integer 
     */
    public function getPickupno()
    {
        return $this->pickupno;
    }

    /**
     * Set pickupexpiredate
     *
     * @param integer $pickupexpiredate
     * @return Reservations
     */
    public function setPickupexpiredate($pickupexpiredate)
    {
        $this->pickupexpiredate = $pickupexpiredate;

        return $this;
    }

    /**
     * Get pickupexpiredate
     *
     * @return integer 
     */
    public function getPickupexpiredate()
    {
        return $this->pickupexpiredate;
    }

    /**
     * Get reserId
     *
     * @return integer 
     */
    public function getReserId()
    {
        return $this->reserId;
    }

    /**
     * Set patron
     *
     * @param \Provider\AlmaBundle\Entity\Patron $patron
     * @return Reservations
     */
    public function setPatron(\Provider\AlmaBundle\Entity\Patron $patron = null)
    {
        $this->patron = $patron;

        return $this;
    }

    /**
     * Get patron
     *
     * @return \Provider\AlmaBundle\Entity\Patron 
     */
    public function getPatron()
    {
        return $this->patron;
    }

    /**
     * Set organisation
     *
     * @param \Provider\AlmaBundle\Entity\Organisations $organisation
     * @return Reservations
     */
    public function setOrganisation(\Provider\AlmaBundle\Entity\Organisations $organisation = null)
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \Provider\AlmaBundle\Entity\Organisations 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set reservationpickupbranch
     *
     * @param \Provider\AlmaBundle\Entity\Branches $reservationpickupbranch
     * @return Reservations
     */
    public function setReservationpickupbranch(\Provider\AlmaBundle\Entity\Branches $reservationpickupbranch = null)
    {
        $this->reservationpickupbranch = $reservationpickupbranch;

        return $this;
    }

    /**
     * Get reservationpickupbranch
     *
     * @return \Provider\AlmaBundle\Entity\Branches 
     */
    public function getReservationpickupbranch()
    {
        return $this->reservationpickupbranch;
    }
}
