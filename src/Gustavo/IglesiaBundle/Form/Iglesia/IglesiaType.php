<?php

namespace Gustavo\IglesiaBundle\Form\Iglesia;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Doctrine\ORM\EntityRepository;

/**
 * Class IglesiaType
 *
 * @package Gustavo\IglesiaBundle\Form\Iglesia
 */
class IglesiaType extends AbstractType
{

   /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
   public function buildForm (FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('nombre', 'text')
           ->add('telefono', 'text')
           ->add('email', 'text')
           ->add('biografia', 'textarea')
           ->add('direccion', 'text')
           ->add('localidad', 'text')
           ->add('redSocial', 'text')
           ->add('Guardar', 'submit');
   }

    /**
     * @return string
     */

    public function getName()
    {
       return 'iglesia';
    }

} 