<?php

namespace Gustavo\IglesiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articulo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gustavo\IglesiaBundle\Entity\ArticuloRepository")
 */
class Articulo
{
    /**
     * @ORM\ManyToOne(targetEntity="Autor", inversedBy="articulos")
     *
     * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor;

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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cuerpo", type="text")
     */
    private $cuerpo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=100)
     */
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_creado", type="datetime")
     */
    private $fCreado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="f_edicion", type="datetime", nullable=true)
     */
    private $fEdicion;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=50, nullable=true)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    private $media;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Articulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     *
     * @return Articulo
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;
    
        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return string 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Articulo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set fCreado
     *
     * @param \DateTime $fCreado
     *
     * @return Articulo
     */
    public function setFCreado($fCreado)
    {
        $this->fCreado = $fCreado;
    
        return $this;
    }

    /**
     * Get fCreado
     *
     * @return \DateTime 
     */
    public function getFCreado()
    {
        return $this->fCreado;
    }

    /**
     * Set fEdicion
     *
     * @param \DateTime $fEdicion
     *
     * @return Articulo
     */
    public function setFEdicion($fEdicion)
    {
        $this->fEdicion = $fEdicion;
    
        return $this;
    }

    /**
     * Get fEdicion
     *
     * @return \DateTime 
     */
    public function getFEdicion()
    {
        return $this->fEdicion;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     *
     * @return Articulo
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Articulo
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    
        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Articulo
     */
    public function setMedia($media)
    {
        $this->media = $media;
    
        return $this;
    }

    /**
     * Get media
     *
     * @return string 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set autor
     *
     * @param \Gustavo\IglesiaBundle\Entity\Autor $autor
     * 
     * @return Articulo
     */
    public function setAutor($autor = null)
    {
        $this->autor = $autor;
    
        return $this;
    }

    /**
     * Get autor
     *
     * @return \Gustavo\IglesiaBundle\Entity\Autor 
     */
    public function getAutor()
    {
        return $this->autor;
    }
}