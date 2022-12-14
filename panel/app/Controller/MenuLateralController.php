<?php

class MenuLateralController
	{
		public function index() // pagina que vai aparecer todos os meus acordos
		{
			try {
				

				$loader = new \Twig\Loader\FilesystemLoader('panel/app/View/');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('MenuLateral.html'); // vai carregar a pagina 
				
				$conteudo = $template->render();
				echo $conteudo;

				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
    }