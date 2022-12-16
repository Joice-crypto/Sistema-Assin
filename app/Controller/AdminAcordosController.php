<?php

	class AdminAcordosController   # Quem vai poder editar,cadastrar,mudar e excluir é somente os administradores
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
                        echo '<script>location.href="/?pagina=Acordos&metodo=index"</script>';
                    }
                    catch (Exception $e) {
                        echo '<script>alert("'.$e->getMessage().'");</script>';
                        echo '<script>location.href="/?pagina=AdminAcordos&metodo=create"</script>';
                    }
                }

                public function delete($paramID){ // deletar do banco de dados 
                    try{
                        
                        Acordos::deleteAgreements($paramID); // leva para a função do model 
                        echo json_encode(array('status' => 'success', 'message' => "Acordo deletado com sucesso!"));
                        echo '<script>location.href="?pagina=Acordos&metodo=index"</script>';
                    }
                    catch (Exception $e) {
                        echo '<script>alert("'.$e->getMessage().'");</script>';
                        echo '<script>location.href="?pagina=Acordos&metodo=index"</script>';
                    }
                }

                public function Change($id){

                    
                    $loader = new \Twig\Loader\FilesystemLoader('app/View/');
                    $twig = new \Twig\Environment($loader);
                    $template = $twig->load('EditAcordo.html'); // vai carregar a pagina de acordos da view

                    $parametros = array();
                    

                    $acordo2 = Acordos::selecionaPorId($id);
                    
                    $parametros['idAcordos'] = $acordo2->idAcordos;
                    $parametros['NomeInstituicao'] = $acordo2->NomeInstituicao;
                    $parametros['PaisInstituicao'] = $acordo2->PaisInstituicao;
                    $parametros['EnderecoInst']= $acordo2->EnderecoInst;
                    $parametros['Continente']= $acordo2->Continente;
                    $parametros['AcStatus']= $acordo2->AcStatus;
                    $parametros['AreaDeCoberturaAcordo']= $acordo2->AreaDeCoberturaAcordo;
                    $parametros['NomeCoordenador']= $acordo2->NomeCoordenador;
                    $parametros['dataAssinatura']= $acordo2->dataAssinatura;
                    $parametros['dataExpiracao']= $acordo2->dataExpiracao;
                    $parametros['periodoVigencia']= $acordo2->periodoVigencia;
                    $parametros['numeroDoProcesso']= $acordo2->numeroDoProcesso;
                    $parametros['TermosAditivos']= $acordo2->TermosAditivos;
                    $parametros['StatusRenovacao']= $acordo2->StatusRenovacao;
                    $parametros['DOU']= $acordo2->DOU;
                    $parametros['dataRenovacao']= $acordo2->dataRenovacao;
                    $parametros['atividadesPrevistas']= $acordo2->atividadesPrevistas;
                    $parametros['publicoAlvo']= $acordo2->publicoAlvo;
                    $parametros['NomeResponsavel']= $acordo2->NomeResponsavel;
                    $parametros['FuncaoResponsavel']= $acordo2->FuncaoResponsavel;
                    $parametros['TelefoneResponsavel']= $acordo2->TelefoneResponsavel;
                    $parametros['ResponsavelEmail']= $acordo2->ResponsavelEmail;
            

                    $conteudo = $template->render($parametros);
                    echo $conteudo;

                }

                public function Update(){ // alterar do banco de dados do banco de dados 

                    try{
                        
                        Acordos::updateAgreements($_POST); // chama a função que esta no model para alterar
                        echo '<script>alert("Publicação alterada com sucesso!");</script>';
                        echo '<script>location.href="?pagina=Acordos&metodo=index"</script>';
                    }
                    catch (Exception $e) {
                        echo '<script>alert("'.$e->getMessage().'");</script>';
                        echo '<script>location.href="?pagina=AdminAcordos&metodo=Change&Id='.$_POST['idAcordos'] .'"</script>';
                    }
                }

    }
