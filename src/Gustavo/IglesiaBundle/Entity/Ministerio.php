<?php

namespace Gustavo\IglesiaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ministerio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gustavo\IglesiaBundle\Entity\MinisterioRepository")
 */
class Ministerio
{
    /**
     * @ORM\OneToMany(targetEntity="Autor", mappedBy="Ministerio")
     */
    private $autor;

    public function __construct()
    {
        $this->autor= new ArrayCollection();
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Ministerio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add autor
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autor
     *
     * @return Ministerio
     */
    public function addAutor(\Gustavo\IglesiaBundle\Entity\Autor $autor)
    {
        $this->autor[] = $autor;
    
        return $this;
    }

    /**
     * Remove autor
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autor
     */
    public function removeAutor(\Gustavo\IglesiaBundle\Entity\Autor $autor)
    {
        $this->autor->removeElement($autor);
    }

    /**
     * Get autor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutor()
    {
        return $this->autor;
    }
}