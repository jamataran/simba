<?php

namespace VehiculoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VehiculoBundle\Entity\Repostaje;
use VehiculoBundle\Forms\RepostajeType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VehiculoBundle:Default:index.html.twig');
    }

    public function repostajeListAction($pagina = 1)
    {

        //TODO -> Esto a servicio
        $items_per_page = 10;
        $offset = ($pagina - 1) * $items_per_page;
        $repostajeRepository=$this->getDoctrine()->getRepository("VehiculoBundle:Repostaje");
        $repostajes = $repostajeRepository->findAll();

        return $this->render('VehiculoBundle:Repostajes:repostaje-list.html.twig',array('pagina'=>$pagina, 'repostajes'=>$repostajes));

    }

    public function repostajeNewAction(Request $request)
    {
        //Creo una instancia de la entidad
        $repostaje = new Repostaje();

        // Creo el formulario.
        $form = $this->createForm(RepostajeType::class, $repostaje);
        $form->handleRequest($request);

        // Si el formulario es correcto, guardo el resultado.
        if ($form->isSubmitted() && $form->isValid()) {
            //TODO Esto a servicio.
            $em = $this->getDoctrine()->getManager();
            $em->persist($repostaje);
            $em->flush();

            return $this->redirectToRoute('lista_repostajes');
        }

        return $this->render('@Vehiculo/Repostajes/repostaje-new.html.twig', array('form' => $form->createView()));

    }

    public function repostajeSaveAction()
    {

    }

    public function layoutAction(){
        return $this->render('layout.bootstrap.html.twig');
    }
}
