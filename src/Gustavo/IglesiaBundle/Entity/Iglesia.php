<?php

namespace Gustavo\IglesiaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Iglesia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gustavo\IglesiaBundle\Entity\IglesiaRepository")
 */
class Iglesia
{
    /**
     * @ORM\OneToMany(targetEntity="Autor", mappedBy="iglesia")
     */
    private $autores;

    public function __construct()
    {
        $this->autores=new ArrayCollection();
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=11, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=255)
     */
    private $localidad;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="red_social", type="string", length=255, nullable=true)
     */
    private $redSocial;

    /**
     * @var text
     *
     * @ORM\Column(name="biografia", type="text")
     */
    private $biografia;

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
     * @return Iglesia
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Iglesia
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
     * Set direccion
     *
     * @param string $direccion
     * @return Iglesia
     */
    public function setDireccion($direccion)
    {
        $this->direccion = ucfirst($direccion);
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Iglesia
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = ucwords($localidad);
    
        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    
    /**
     * Set redSocial
     *
     * @param string $redSocial
     *
     * @return Iglesia
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
     * Add autor
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autor
     *
     * @return Iglesia
     */
    public function addAutor($autor)
    {
        $this->autor[] = $autor;
    
        return $this;
    }

    /**
     * Remove autor
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autor
     */
    public function removeAutor($autor)
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

    /**
     * Set biografia
     *
     * @param string $biografia
     *
     * @return Iglesia
     */
    public function setBiografia($biografia)
    {
        $this->biografia = ucfirst($biografia);
    
        return $this;
    }

    /**
     * Get biografia
     *
     * @return string 
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Iglesia
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
     * Add autores
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autores
     * @return Iglesia
     */
    public function addAutore($autores)
    {
        $this->autores[] = $autores;
    
        return $this;
    }

    /**
     * Remove autores
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autores
     */
    public function removeAutore($autores)
    {
        $this->autores->removeElement($autores);
    }

    /**
     * Get autores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutores()
    {
        return $this->autores;
    }
}