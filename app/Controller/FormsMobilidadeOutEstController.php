<?php

require_once("Core/core.php");



class Forms1Controller {

    public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('FormsMobilidadeOutEst.html');

        $parametros = array();
        $parametros['nome'] = 'Joice';

       $conteudo =  $template->render($parametros);

       echo $conteudo;
			

    }

    public function createMobOutEstudante($StudentBrasilModel){

    }



}


