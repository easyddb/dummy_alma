<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loans
 *
 * @ORM\Table(name="loans", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="fk_loan_patron_idx", columns={"patron"}), @ORM\Index(name="fk_loan_org_idx", columns={"organisation"}), @ORM\Index(name="fk_loan_branch_idx", columns={"loanBranch"})})
 * @ORM\Entity
 */
class Loans
{
    /**
     * @var integer
     *
     * @ORM\Column(name="loanDueDate", type="integer", nullable=false)
     */
    private $loanduedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="loanDate", type="integer", nullable=false)
     */
    private $loandate;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=32, nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="loanIsRenewableMessage", type="string", length=32, nullable=true)
     */
    private $loanisrenewablemessage;

    /**
     * @var string
     *
     * @ORM\Column(name="loanIsRenewableValue", type="string", length=32, nullable=false)
     */
    private $loanisrenewablevalue;

    /**
     * @var string
     *
     * @ORM\Column(name="catalogueRecordId", type="string", length=32, nullable=false)
     */
    private $cataloguerecordid;

    /**
     * @var integer
     *
     * @ORM\Column(name="loan_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loanId;

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
     *   @ORM\JoinColumn(name="loanBranch", referencedColumnName="bra_id")
     * })
     */
    private $loanbranch;



    /**
     * Set loanduedate
     *
     * @param integer $loanduedate
     * @return Loans
     */
    public function setLoanduedate($loanduedate)
    {
        $this->loanduedate = $loanduedate;

        return $this;
    }

    /**
     * Get loanduedate
     *
     * @return integer 
     */
    public function getLoanduedate()
    {
        return $this->loanduedate;
    }

    /**
     * Set loandate
     *
     * @param integer $loandate
     * @return Loans
     */
    public function setLoandate($loandate)
    {
        $this->loandate = $loandate;

        return $this;
    }

    /**
     * Get loandate
     *
     * @return integer 
     */
    public function getLoandate()
    {
        return $this->loandate;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Loans
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
     * Set loanisrenewablemessage
     *
     * @param string $loanisrenewablemessage
     * @return Loans
     */
    public function setLoanisrenewablemessage($loanisrenewablemessage)
    {
        $this->loanisrenewablemessage = $loanisrenewablemessage;

        return $this;
    }

    /**
     * Get loanisrenewablemessage
     *
     * @return string 
     */
    public function getLoanisrenewablemessage()
    {
        return $this->loanisrenewablemessage;
    }

    /**
     * Set loanisrenewablevalue
     *
     * @param string $loanisrenewablevalue
     * @return Loans
     */
    public function setLoanisrenewablevalue($loanisrenewablevalue)
    {
        $this->loanisrenewablevalue = $loanisrenewablevalue;

        return $this;
    }

    /**
     * Get loanisrenewablevalue
     *
     * @return string 
     */
    public function getLoanisrenewablevalue()
    {
        return $this->loanisrenewablevalue;
    }

    /**
     * Set cataloguerecordid
     *
     * @param string $cataloguerecordid
     * @return Loans
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
     * Get loanId
     *
     * @return integer 
     */
    public function getLoanId()
    {
        return $this->loanId;
    }

    /**
     * Set patron
     *
     * @param \Provider\AlmaBundle\Entity\Patron $patron
     * @return Loans
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
     * @return Loans
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
     * Set loanbranch
     *
     * @param \Provider\AlmaBundle\Entity\Branches $loanbranch
     * @return Loans
     */
    public function setLoanbranch(\Provider\AlmaBundle\Entity\Branches $loanbranch = null)
    {
        $this->loanbranch = $loanbranch;

        return $this;
    }

    /**
     * Get loanbranch
     *
     * @return \Provider\AlmaBundle\Entity\Branches 
     */
    public function getLoanbranch()
    {
        return $this->loanbranch;
    }
}
