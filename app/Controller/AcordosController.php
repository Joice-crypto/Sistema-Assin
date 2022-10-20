<?php

	class AcordosController
	{
		public function index() // pagina que vai aparecer todos os meus acordos
		{
			try {
				

				$loader = new \Twig\Loader\FilesystemLoader('app/View/');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('Acordos.html'); // vai carregar a pagina de acordos da view
				$colecAgreements = Acordos::getAllAgreements();
				$parametros = array();

				$parametros['Acordos'] = $colecAgreements; // estou mandando os acordos para a coleção de Acortodos para recuperar na view

				$conteudo = $template->render($parametros);
				echo $conteudo;

				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function GetAcordo($params){ // vai pegar apenas um acordo 

       
        
			try {
				$acordo = Acordos::selecionaPorId($params); // aqui vai aparecer um acordo selecionado por ID 
				
		
				$loader = new \Twig\Loader\FilesystemLoader('app/View');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('GetAcordo.html');
		
				$parametros = array();
				
				$parametros['idAcordos'] = $acordo->idAcordos;
				$parametros['NomeInstituicao'] = $acordo->NomeInstituicao;
				$parametros['PaisInstituicao'] = $acordo->PaisInstituicao;
				$parametros['EnderecoInst']= $acordo->EnderecoInst;
				$parametros['Continente']= $acordo->Continente;
				$parametros['AcStatus']= $acordo->AcStatus;
				$parametros['AreaDeCoberturaAcordo']= $acordo->AreaDeCoberturaAcordo;
				$parametros['NomeCoordenador']= $acordo->NomeCoordenador;
				$parametros['dataAssinatura']= $acordo->dataAssinatura;
				$parametros['dataExpiracao']= $acordo->dataExpiracao;
				$parametros['periodoVigencia']= $acordo->periodoVigencia;
				$parametros['numeroDoProcesso']= $acordo->numeroDoProcesso;
				$parametros['TermosAditivos']= $acordo->TermosAditivos;
				$parametros['StatusRenovacao']= $acordo->StatusRenovacao;
				$parametros['DOU']= $acordo->DOU;
				$parametros['dataRenovacao']= $acordo->dataRenovacao;
				$parametros['atividadesPrevistas']= $acordo->atividadesPrevistas;
				$parametros['publicoAlvo']= $acordo->publicoAlvo;
				$parametros['NomeResponsavel']= $acordo->NomeResponsavel;
				$parametros['FuncaoResponsavel']= $acordo->FuncaoResponsavel;
				$parametros['TelefoneResponsavel']= $acordo->TelefoneResponsavel;
				$parametros['ResponsavelEmail']= $acordo->ResponsavelEmail;
		   
		
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
		public function insert(){ // vou pegar os dados do create e jogar no banco de dados para inserir
			try{
				Acordos::insertAgreements($_POST);
				echo json_encode(array('status' => 'success', 'message' => "Acordo cadastrado com sucesso!"));
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=index"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=create"</script>';
			}
		}

		public function delete($paramID){ // deletar do banco de dados 
			try{
				
				Acordos::deleteAgreements($paramID); // leva para a função do model 
				echo json_encode(array('status' => 'success', 'message' => "Acordo deletado com sucesso!"));
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=index"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=index"</script>';
			}
		}

		public function Update(){ // alterar do banco de dados do banco de dados 
			try{
				
				Acordos::UpdateAgreements($_POST); // chama a função que esta no model para alterar
				echo json_encode(array('status' => 'success', 'message' => "Acordo alterado com sucesso!"));
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=index"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost:8000/?pagina=Acordos&metodo=Update&Id='.$_POST['idAcordos'] .'"</script>';
			}
		}



		
	
			
	}
	