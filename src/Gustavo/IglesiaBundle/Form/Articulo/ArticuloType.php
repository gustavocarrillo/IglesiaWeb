<?php

namespace Gustavo\IglesiaBundle\Form\Articulo;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Doctrine\ORM\EntityRepository;

class ArticuloType extends AbstractType {


   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('titulo', 'text')
           ->add('autor', 'entity', array('class'=>'IglesiaBundle:Autor', 'property'=>'nombre',
                                          'empty_value'=>'------------selec-------------'))
           ->add('tipo', 'choice', array('choices' => array('estudios'=>'Estudios',
                                         'predicaciones'=>'Predicaciones'),
                                         'empty_value'=>'------------selec-------------'))
           ->add('cuerpo', 'textarea')
           ->add('imagen', 'text')
           ->add('Guardar', 'submit');
   }

    /**
     * @return string
     */
   public function getName()
   {
       return 'articulo';
   }

} 