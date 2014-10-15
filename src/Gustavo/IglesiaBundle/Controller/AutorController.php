<?php

namespace Gustavo\IglesiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gustavo\IglesiaBundle\Entity\Autor;
use Gustavo\IglesiaBundle\Form\Autor\AutorType;
use Symfony\Component\HttpFoundation\Request;


class AutorController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
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

                return  $this->redirect($this->generateUrl('autor_creado'));
            }
        }

        return $this->render('IglesiaBundle:Default:autor_form.html.twig', array(
            'form' => $form->createView(),
            ));
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mostrarTodoAction()
    {
        $x = $this->getDoctrine()->getManager();

        $autores = $x->getRepository('IglesiaBundle:Autor')->todoOrdenadoXnombre();

        return $this->render('IglesiaBundle:Default:autores.html.twig', array('autor' => $autores));
    }

    /**
     * @param $id
     *
     * @return Response|\Symfony\Component\HttpFoundation\Response
     */
    public function mostrarAutorAction($id)
    {
        $autor = $this->getDoctrine()
            ->getRepository('IglesiaBundle:Autor')
            ->autorEspec($id);

        $iglesia = $autor->getIglesia()->getNombre();

        if ($autor != null) {
            return $this->render('IglesiaBundle:Default:autor.html.twig', array('autor' => $autor, 'iglesia'=>$iglesia));
        } else {
            return new Response('No existen registros');
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exitoAction()
    {
       $e="¡Los datos se han guardado exitosamente!";

       return $this->render('IglesiaBundle:Default:exito.html.twig', array('e' => $e));
    }
}
