<?php

class Core
	{
		public function start($urlGet)
		{

			if (isset($urlGet['metodo'])) {
				$acao = $urlGet['metodo'];
			} else {
				$acao = 'index';
			}

			if (isset($urlGet['pagina'])) {
				$controller = ucfirst($urlGet['pagina'].'Controller');
			} else {
				$controller = 'HomeController';
			}
			

			if (!class_exists($controller)) {
				$controller = 'ErroController';
			}


			if (isset($urlGet['idAcordos']) && $urlGet['idAcordos'] != null) {
				$id = $urlGet['idAcordos']; // pegando o id da minha url como parametro se ela nao tem parametro então id é null
			} else {
				$id = null;
			}

			call_user_func_array(array(new $controller, $acao), array($id));
			

			

		}
	}