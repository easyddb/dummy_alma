<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Branches
 *
 * @ORM\Table(name="branches", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="code", columns={"code", "shortname", "name"}), @ORM\Index(name="language", columns={"language"}), @ORM\Index(name="fk_branch_org_idx", columns={"organisation"})})
 * @ORM\Entity
 */
class Branches
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=32, nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="shortname", type="string", length=32, nullable=false)
     */
    private $shortname;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=5, nullable=false)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="bra_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $braId;

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
     * Set id
     *
     * @param string $id
     * @return Branches
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
     * Set code
     *
     * @param string $code
     * @return Branches
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set shortname
     *
     * @param string $shortname
     * @return Branches
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * Get shortname
     *
     * @return string 
     */
    public function getShortname()
    {
        return $this->shortname;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Branches
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Branches
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get braId
     *
     * @return integer 
     */
    public function getBraId()
    {
        return $this->braId;
    }

    /**
     * Set organisation
     *
     * @param \Provider\AlmaBundle\Entity\Organisations $organisation
     * @return Branches
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
