<?php

namespace Gustavo\IglesiaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;

/**
 * Autor
 * @ORM\Table()
 * @ORM\Entity
 */

/**
 * @ORM\Entity(repositoryClass="Gustavo\IglesiaBundle\Entity\AutorRepository")
 *
 */

class Autor
{
    /**
     * @ORM\OneToMany(targetEntity="Articulo", mappedBy="Autor")
     */
    private $articulo;

    public  function __construct()
    {
        $this->articulo = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Iglesia",inversedBy="Autor")
     * @ORM\JoinColumn(name="iglesia_id", referencedColumnName="id")
     */
    private $iglesia;

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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ministerio", type="string", length=100)
     */
    private $ministerio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=11, nullable=true)
     *
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="redSocial", type="string", length=255,  nullable=true)
     */
    private $redSocial;


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
     *
     * @return Autor
     */
    public function setNombre($nombre)
    {
        $this->nombre = ucwords($nombre);

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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Autor
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = ucfirst($descripcion);

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Autor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Autor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Autor
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set redSocial
     *
     * @param string $redSocial
     *
     * @return Autor
     */
    public function setRedSocial($redSocial)
    {
        $this->redSocial = $redSocial;

        return $this;
    }

    /**
     * Get redSocial
     *
     * @return string 
     */
    public function getRedSocial()
    {
        return $this->redSocial;
    }


    /**
     * Set iglesia
     *
     * @param \Gustavo\IglesiaBundle\Entity\Iglesia $iglesia
     *
     * @return Autor
     */
    public function setIglesia(\Gustavo\IglesiaBundle\Entity\Iglesia $iglesia = null)
    {
        $this->iglesia = $iglesia;
    
        return $this;
    }

    /**
     * Get iglesia
     *
     * @return \Gustavo\IglesiaBundle\Entity\Iglesia 
     */
    public function getIglesia()
    {
        return $this->iglesia;
    }

    /**
     * Set ministerio
     *
     * @param string $ministerio
     *
     * @return Autor
     */
    public function setMinisterio($ministerio)
    {
        $this->ministerio = $ministerio;
    
        return $this;
    }

    /**
     * Get ministerio
     *
     * @return string 
     */
    public function getMinisterio()
    {
        return $this->ministerio;
    }

    /**
     * Add articulo
     *
     * @param \Gustavo\IglesiaBundle\Entity\Articulo $articulo
     * @return Autor
     */
    public function addArticulo(\Gustavo\IglesiaBundle\Entity\Articulo $articulo)
    {
        $this->articulo[] = $articulo;
    
        return $this;
    }

    /**
     * Remove articulo
     *
     * @param \Gustavo\IglesiaBundle\Entity\Articulo $articulo
     */
    public function removeArticulo(\Gustavo\IglesiaBundle\Entity\Articulo $articulo)
    {
        $this->articulo->removeElement($articulo);
    }

    /**
     * Get articulo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
}