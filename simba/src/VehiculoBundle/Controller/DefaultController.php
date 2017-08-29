<?php

namespace VehiculoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VehiculoBundle:Default:index.html.twig');
    }

    public function repostajeListAction($pagina = 0){

        //TODO -> Esto a servicio
        $items_per_page = 10;
        $offset = ($pagina - 1) * $items_per_page;
        $repostajeRepository=$this->getDoctrine()->getRepository("VehiculoBundle:Repostaje");
        $repostajes=$repostajeRepository->findAll();
        //$repostajes=$repostajeRepository->findBy(array('id'=>'12997'),null,$offset,$items_per_page);

        return $this->render('VehiculoBundle:Repostajes:repostaje-list.html.twig',array('pagina'=>$pagina, 'repostajes'=>$repostajes));

    }

    public function layoutAction(){
        return $this->render('layout.bootstrap.html.twig');
    }
}
