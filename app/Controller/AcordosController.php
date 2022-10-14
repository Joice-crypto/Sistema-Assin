<?php

	class AcordosController
	{
		public function index()
		{
			try {
				$colecAgreements = Acordos::getAllAgreements();

				$loader = new \Twig\Loader\FilesystemLoader('app/View/');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('Acordos.html'); // vai carregar a pagina de acordos da view

				$parametros = array();

				$parametros['Acordos'] = $colecAgreements; // estou mandando os acordos para a coleção de Acortodos para recuperar na view

				$conteudo = $template->render($parametros);
				echo $conteudo;

				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		public function create() // vou criar um acordo internacional
		{
			
			$loader = new \Twig\Loader\FilesystemLoader('app/View/');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('FormsAcordoInter.html'); // vai carregar a pagina de acordos da view

			$parametros = array();


			$conteudo = $template->render($parametros);
			echo $conteudo;

	
		}
		public function insert(){ // vou pegar os dados do create e jogar no banco de dados
			try{
				Acordos::insertAgreements($_POST);
			echo '<script>alert("Publicação inserida com sucesso!");</script>';
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=index"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=create"</script>';
			}
		}

		
	
			
	}
	