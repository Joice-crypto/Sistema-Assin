<?php 



class HomeController
	{
		public function index()
		{
			
			try {

				$loader = new \Twig\Loader\FilesystemLoader('app/View/');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('Home.html'); // apenas vai carregar a pagina inicial
				$parametros = array();
				$conteudo = $template->render($parametros);
				echo $conteudo;
				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}		
			
		
	}
}