<?php

require_once("Core/core.php");



class FormsMobOutEstudante {

    public function index(){

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('FormsMobilidadeOutEst.html');

			

    }

    public function createMobOutEstudante($StudentBrasilModel){

    }



}


