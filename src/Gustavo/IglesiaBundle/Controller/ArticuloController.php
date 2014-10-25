<?php

namespace Gustavo\IglesiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gustavo\IglesiaBundle\Entity\Articulo;
use Gustavo\IglesiaBundle\Form\Articulo\ArticuloType;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class ArticuloController
 *
 * @package Gustavo\IglesiaBundle\Controller
 */
class ArticuloController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        $articulo = new Articulo();

        $form = $this->createForm(new ArticuloType(), $articulo);

        $form->handleRequest($request);

        if ($request->getMethod()=='POST') {
            if ($form->isValid()) {
                try
                {
                    $articulo->setFCreado(new \DateTime('now'));
                    $articulo->setEstatus('Pendiente');
                    $articulo=$form->getData();
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($articulo);
                    $em->flush();

                    return  $this->redirect($this->generateUrl('autor_creado'));
                }
                catch(\Exception $e)
                {
                    $msj = $e->getMessage();
                    $code = $e->getCode();
                    $file = $e->getFile();
                    $line = $e->getLine();
                    $trace = $e->getTraceAsString();

                    return $this->render('IglesiaBundle::exception_control.html.twig', array(
                                    'msj'=>$msj, 'code'=>$code, 'file'=>$file, 'line'=>$line,
                                     'trace'=>$trace
                    ));
                }

            }
        }

        return $this->render('IglesiaBundle:Default:articulo_form.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    public function mostrarTodoAction()
    {
        $articulo=$this->getDoctrine()
            ->getRepository('IglesiaBundle:Articulo')
            ->mostrarTodoXFecha();

        return $this->render('IglesiaBundle:Default:articulos.html.twig', array('articulo'=>$articulo));
    }

    public function mostrarArticuloAction($id)
    {
        $articulo = $this->getDoctrine()
            ->getRepository('IglesiaBundle:Articulo')
            ->mostrarArticulo($id);

        $autor = $articulo->getAutor()->getNombre();

        if ($articulo != null) {
            return $this->render('IglesiaBundle:Default:articulo.html.twig', array(
                'articulo'=>$articulo, 'autor'=>$autor
            ));
        } else {
            return new Response('No existe el articulo solicitado');
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
