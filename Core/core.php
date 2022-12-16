<?php

class Core
	{
		private $url;

		private $controller;
		private $method = 'index';
		private $params = array();

		private $user;

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
		public function start($request)
		{
			if (isset($request['url'])){
				$this->url = explode('/', $request['url']);

				$this->controller = ucfirst($this->url[0]).'Controller';
				array_shift($this->url);

				if (isset($this->url[0]) && $this->url != '') {
					$this->method = $this->url[0];
					array_shift($this->url);

					if (isset($this->url[0]) && $this->url != '') {
						$this->params = $this->url;
					}
				}
			}
			
			if ($this->user) {
				$pg_permission = ['HomeController'];

				if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
					$this->controller = 'HomeController';
					$this->method = 'index';
				}
			} else {
				$pg_permission = ['LoginController'];

				if (!isset($this->controller) || !in_array($this->controller, $pg_permission)) {
					$this->controller = 'LoginController';
					$this->method = 'index';
				}
			}

			return call_user_func(array(new $this->controller, $this->method), $this->params);
			//var_dump($this->controller, $this->method, $this->params);
		}
	}
		// public function start($urlGet)
		// {

		// 	if (isset($urlGet['metodo'])) {
		// 		$acao = $urlGet['metodo'];
		// 	} else {
		// 		$acao = 'index';
		// 	}

		// 	if (isset($urlGet['pagina'])) {
		// 		$controller = ucfirst($urlGet['pagina'].'Controller');
		// 	} else {
		// 		$controller = 'HomeController';
		// 	}
			

		// 	if (!class_exists($controller)) {
		// 		$controller = 'ErroController';
		// 	}


		// 	if (isset($urlGet['id']) && $urlGet['id'] != null) {
		// 		$id = $urlGet['id']; // pegando o id da minha url como parametro se ela nao tem parametro então id é null
		// 	} else {
		// 		$id = null;
		// 	}

		// 	call_user_func_array(array(new $controller, $acao), array($id));
			

			

	