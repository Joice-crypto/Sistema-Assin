<?php

class Core
	{
		
		private $user;
		private $controller;
		private $method = 'index';
		private $params = array();

		private $error;

		public function __construct()
		{
			$this->user = $_SESSION['usr'] ?? null;
			$this->error = $_SESSION['msg_error'] ?? null;

			if (isset($this->error)) {
				if ($this->error['count'] === 0) {
					$_SESSION['msg_error']['count']++;
				} else {
					unset($_SESSION['msg_error']);
				}
			}
		}
	
		public function start($urlGet)
		{

			// if (isset($urlGet['metodo'])) {
			// 	$acao = $urlGet['metodo'];
			// } else {
			// 	$acao = 'index';
			// }

			// if (isset($urlGet['pagina'])) {
			// 	$controller = ucfirst($urlGet['pagina'].'Controller');
			// } else {
			
			
			// $controller = 'HomeController';
			// }
			

			// if (!class_exists($this->controller)) {
			// 	$this->controller = 'ErroController';
			// }


			if (isset($urlGet['id']) && $urlGet['id'] != null) {
				$id = $urlGet['id']; // pegando o id da minha url como parametro se ela nao tem parametro então id é null
			} else {
				$id = null;
			}

			if (isset($urlGet['pagina'])){
			

				$this->controller = ucfirst($urlGet['pagina']).'Controller';

				if (isset($urlGet['metodo']) && $urlGet['metodo'] != '') {
					$this->method = $urlGet['metodo'];

					if (isset($urlGet['pagina']) && $urlGet['pagina'] != '') {
						$this->params = $urlGet['pagina'];
					}
				}
			}


			if ($this->user) { // se o usuario estiver logado
				$pg_permission = ['HomeController' , 'AcordosController']; // ele pode acessar essas

				if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
					$this->controller = 'HomeController';
					$this->method = 'index';
				}
				
			} else {
				$pg_permission = ['LoginController'];

			//  if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
			// 	 	$this->controller = 'LoginController';
			// 	 	$this->method = 'index';
			// 	 } // se não estiver logado ele so pode ficar no index de login
			}
			
			return call_user_func(array(new $this->controller, $this->method),  array($id));

		
	}
}
		
			

			

	