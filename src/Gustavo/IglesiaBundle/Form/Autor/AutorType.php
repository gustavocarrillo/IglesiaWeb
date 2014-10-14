<?php

namespace Gustavo\IglesiaBundle\Form\Autor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Doctrine\ORM\EntityRepository;



class AutorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder
           ->add('nombre', 'text', array('label'=>'Nombre:'))
           ->add('ministerio', 'choice', array(
                               'choices' => array('apostol'=>'Apostol',
                                                  'evangelista'=>'Evangelista',
                                                  'maestro'=>'Maestro',
                                                  'pastor'=>'Pastor',
                                                  'profeta'=>'Profeta'),
                                'empty_value'=>'------------selec-------------'))
           ->add('iglesia', 'entity', array('class'=>'IglesiaBundle:Iglesia', 'property'=>'nombre',
                                            'empty_value'=>'------------selec-------------'))
           ->add('descripcion', 'textarea', array('label'=>'Descripcion:'))
           ->add('telefono', 'text', array('label'=>'Telefono:'))
           ->add('email', 'text', array('label'=>'Email:'))
           ->add('foto', 'text', array('label'=>'Foto:'))
           ->add('redSocial', 'text', array('label'=>'Red Social:'))
           ->add('Guardar', 'submit');
   }

   public function getName()
   {
       return 'autor';
   }

} 