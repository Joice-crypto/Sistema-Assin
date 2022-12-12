<?php 

class LoginController
	{
		public function index()
		{
			
			try {
				

				$loader2 = new \Twig\Loader\FilesystemLoader('app/View/');
				$twig = new \Twig\Environment($loader2);
				$template = $twig->load('Login.html'); // apenas vai carregar a pagina inicial
				$parametros = array();
				$conteudo = $template->render($parametros);
				echo $conteudo;
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}		
			
		
	}
}