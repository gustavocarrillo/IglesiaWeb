<?php

namespace Gustavo\IglesiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gustavo\IglesiaBundle\Entity\Iglesia;
use Gustavo\IglesiaBundle\Form\Iglesia\IglesiaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AutorController
 *
 * @package Gustavo\IglesiaBundle\Controller
 */
class IglesiaController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        $iglesia = new Iglesia();

        $form = $this->createForm(new IglesiaType(), $iglesia);

        $form->handleRequest($request);

        if ( $request->getMethod() =='POST' ) {
           if ( $form->isValid() ) {
                $iglesia=$form->getData();
                $em=$this->getDoctrine()->getManager();
                $em->persist($iglesia);
                $em->flush();

                return  new Response('La Iglesia se ha registrado satisfactoriamente');
           }
        }

        return $this->render('IglesiaBundle:Default:iglesia_form.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exitoAction()
    {
       $e="¡Los datos se han guardado exitosamente!";

       return $this->render('IglesiaBundle:Default:exito.html.twig', array('e' => $e));
    }

    /**
     * @return Response
     */

    public function mostrarTodoAction()
    {
        $x = $this->getDoctrine()->getManager();

        $iglesias = $x->getRepository('IglesiaBundle:Iglesia')->todoOrdenadoXnombre();

        return $this->render('IglesiaBundle:Default:iglesias.html.twig', array('iglesia' => $iglesias));
    }

    /**
     * @param $id
     *
     * @return Response
     */
    public function mostrarIglesiaAction($id)
    {
        $x = $this->getDoctrine()->getManager();
        $iglesia = $x->getRepository('IglesiaBundle:Iglesia')->find($id);

        if ($iglesia != null) {
            return $this->render('IglesiaBundle:Default:iglesia.html.twig', array('iglesia' => $iglesia));
        } else {
            return new Response('No existen registros');
        }
    }

    public function noRegistros()
    {
        
    }
}
