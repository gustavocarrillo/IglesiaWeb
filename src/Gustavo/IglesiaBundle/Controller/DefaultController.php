<?php

namespace Gustavo\IglesiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gustavo\IglesiaBundle\Entity\Autor;
use Gustavo\IglesiaBundle\Form\Autor\AutorType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('IglesiaBundle:Default:index.html.twig', array('name' => $name));
    }

    public function formAction(Request $request)
    {
        $autor = new Autor();

        $form = $this->createForm(new AutorType(), $autor);

        $form->handleRequest($request);

        if($request->getMethod()=='POST')
        {
            if($form->isValid()){

                $autor=$form->getData();
                $em=$this->getDoctrine()->getManager();
                $em->persist($autor);
                $em->flush();

                return  $this->redirect($this->generateUrl('iglesia_exito'));
            }
        }

        return $this->render('IglesiaBundle:Default:form.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    public function form2Action(Request $request)
    {
        $autor = new Autor();

        $form=$this->createFormBuilder($autor)
            ->add('nombre', 'text', array('label'=>'Nombre:'))
            ->add('ministerio', 'text', array('label'=>'Ministerio:'))
            ->add('iglesia', 'text', array('label'=>'Iglesia:'))
            ->add('descripcion', 'text', array('label'=>'Descripcion:'))
            ->add('telefono', 'text', array('label'=>'Telefono:'))
            ->add('email', 'text', array('label'=>'Email'))
            ->add('foto', 'text', array('label'=>'Foto'))
            ->add('redSocial', 'text', array('label'=>'Red Social'))
            ->add('Enviar', 'submit')
            ->getForm();

            $form->handleRequest($request);

            $autor=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($autor);
            $em->flush();

            return  $this->redirect($this->generateUrl('iglesia_exito'));


        return $this->render('IglesiaBundle:Default:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    public function exitoAction()
    {
       $e="¡Los datos se han guardado exitosamente!";
       return $this->render('IglesiaBundle:Default:exito.html.twig',array('e' => $e));
    }
}
