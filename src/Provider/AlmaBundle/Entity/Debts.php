<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Debts
 *
 * @ORM\Table(name="debts", uniqueConstraints={@ORM\UniqueConstraint(name="debtId", columns={"debtIdentifier"})}, indexes={@ORM\Index(name="fk_debt_patron_idx", columns={"patron"}), @ORM\Index(name="fk_debt_org_idx", columns={"organisation"})})
 * @ORM\Entity
 */
class Debts
{
    /**
     * @var string
     *
     * @ORM\Column(name="debtNote", type="string", length=255, nullable=false)
     */
    private $debtnote;

    /**
     * @var float
     *
     * @ORM\Column(name="debtAmount", type="float", precision=10, scale=0, nullable=false)
     */
    private $debtamount;

    /**
     * @var string
     *
     * @ORM\Column(name="debtType", type="string", length=64, nullable=false)
     */
    private $debttype;

    /**
     * @var integer
     *
     * @ORM\Column(name="debtDate", type="integer", nullable=false)
     */
    private $debtdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="debtIdentifier", type="integer", nullable=false)
     */
    private $debtidentifier;

    /**
     * @var integer
     *
     * @ORM\Column(name="debt_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $debtId;

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
     * Set debtnote
     *
     * @param string $debtnote
     * @return Debts
     */
    public function setDebtnote($debtnote)
    {
        $this->debtnote = $debtnote;

        return $this;
    }

    /**
     * Get debtnote
     *
     * @return string 
     */
    public function getDebtnote()
    {
        return $this->debtnote;
    }

    /**
     * Set debtamount
     *
     * @param float $debtamount
     * @return Debts
     */
    public function setDebtamount($debtamount)
    {
        $this->debtamount = $debtamount;

        return $this;
    }

    /**
     * Get debtamount
     *
     * @return float 
     */
    public function getDebtamount()
    {
        return $this->debtamount;
    }

    /**
     * Set debttype
     *
     * @param string $debttype
     * @return Debts
     */
    public function setDebttype($debttype)
    {
        $this->debttype = $debttype;

        return $this;
    }

    /**
     * Get debttype
     *
     * @return string 
     */
    public function getDebttype()
    {
        return $this->debttype;
    }

    /**
     * Set debtdate
     *
     * @param integer $debtdate
     * @return Debts
     */
    public function setDebtdate($debtdate)
    {
        $this->debtdate = $debtdate;

        return $this;
    }

    /**
     * Get debtdate
     *
     * @return integer 
     */
    public function getDebtdate()
    {
        return $this->debtdate;
    }

    /**
     * Set debtidentifier
     *
     * @param integer $debtidentifier
     * @return Debts
     */
    public function setDebtidentifier($debtidentifier)
    {
        $this->debtidentifier = $debtidentifier;

        return $this;
    }

    /**
     * Get debtidentifier
     *
     * @return integer 
     */
    public function getDebtidentifier()
    {
        return $this->debtidentifier;
    }

    /**
     * Get debtId
     *
     * @return integer 
     */
    public function getDebtId()
    {
        return $this->debtId;
    }

    /**
     * Set patron
     *
     * @param \Provider\AlmaBundle\Entity\Patron $patron
     * @return Debts
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
     * @return Debts
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
}
