<?php

namespace Provider\AlmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collections
 *
 * @ORM\Table(name="collections", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Collections
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="col_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $colId;



    /**
     * Set id
     *
     * @param string $id
     * @return Collections
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
     * @return Collections
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
     * @return Collections
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
     * @return Collections
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
     * @return Collections
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
     * Get colId
     *
     * @return integer 
     */
    public function getColId()
    {
        return $this->colId;
    }
}
