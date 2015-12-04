<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sublocations
 *
 * @ORM\Table(name="sublocations", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="code", columns={"code"}), @ORM\Index(name="language", columns={"language"})})
 * @ORM\Entity
 */
class Sublocations
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
     * @ORM\Column(name="subloc_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sublocId;



    /**
     * Set id
     *
     * @param string $id
     * @return Sublocations
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
     * @return Sublocations
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
     * @return Sublocations
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
     * @return Sublocations
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
     * @return Sublocations
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
     * Get sublocId
     *
     * @return integer 
     */
    public function getSublocId()
    {
        return $this->sublocId;
    }
}
