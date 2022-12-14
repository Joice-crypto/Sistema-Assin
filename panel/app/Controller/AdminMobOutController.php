<?php

require_once('panel\app\Model\MobOutServidor.php');


class AdminMobOutController
{
    # Quem vai poder editar,cadastrar,mudar e excluir é somente os administradores

    public function createServidor() // vou chamar a pagina de criar um aluno em mobilidade out
    {
        
        $loader = new \Twig\Loader\FilesystemLoader('panel/app/View/');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('FormsMobilidadeOutProf.html'); // vai carregar a pagina da view

        $parametros = array();


        $conteudo = $template->render($parametros);
        echo $conteudo;


    }

    public function insertServidor(){ // vou pegar os dados do create e jogar no banco de dados para inserir
         
        
        try{
            MobOutServidor::insertServidor($_POST);
            echo json_encode(array('status' => 'success', 'message' => "Servidor cadastrado com sucesso!"));
            echo '<script>location.href="?pagina=MobOut&metodo=getAllMobOutServidor"</script>';
        }
         catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="?pagina=MOEstudante&metodo=createServidor"</script>';
        }
    }

    
    public function create() // vou chamar a pagina de criar um aluno em mobilidade out
		{
			
			$loader = new \Twig\Loader\FilesystemLoader('panel/app/View/');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('FormsMobilidadeOutEst.html'); // vai carregar a pagina da view

			$parametros = array();


			$conteudo = $template->render($parametros);
			echo $conteudo;

	
		}

        public function insert(){ // vou pegar os dados do create e jogar no banco de dados para inserir
         
        
			try{
				MobOutEstudante::insertMobOutStudent($_POST);
				echo json_encode(array('status' => 'success', 'message' => "Aluno cadastrado com sucesso!"));
				echo '<script>location.href="?pagina=MobOut&metodo=GetAllMobOutStudents"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="?pagina=MOEstudante&metodo=create"</script>';
			}
		}

        public function Delete($paramID){ // deletar do banco de dados 
            
			try{
				
				MobOutEstudante::deleteStudent($paramID); // leva para a função do model 
				echo json_encode(array('status' => 'success', 'message' => "Estudante deletado com sucesso!"));
				echo '<script>location.href="/?pagina=MobOut&metodo=GetAllMobOutStudents"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="/?pagina=MobOut&metodo=GetAllMobOutStudents""</script>';
			}
		}

        public function Mudar($id){

			
			$loader = new \Twig\Loader\FilesystemLoader('panel/app/View/');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('EditMOStudent.html'); // vai carregar a pagina de acordos da view

			$parametros = array();
			

			 $mobStd = MobOutEstudante::GetMobilidadeById($id);

             $parametros['idEstudante'] = $mobStd->idEstudante;
             $parametros['EstudanteMobOut_InstituicaoDest'] = $mobStd->EstudanteMobOut_InstituicaoDest;
             $parametros['EstudanteMobOut_PaisDest'] = $mobStd->EstudanteMobOut_PaisDest;
             $parametros['EstudanteMobOut_CartaAceitacao'] = $mobStd->EstudanteMobOut_CartaAceitacao;
             $parametros['EstudanteMobOut_Programa'] = $mobStd->EstudanteMobOut_Programa;
             $parametros['EstudanteMobOut_email'] = $mobStd->EstudanteMobOut_email;
             $parametros['EstudanteMobOut_Campus'] = $mobStd->EstudanteMobOut_Campus;
             $parametros['EstudanteMobOut_Grau'] = $mobStd->EstudanteMobOut_Grau;
             $parametros['EstudanteMobOut_Nome'] = $mobStd->EstudanteMobOut_Nome;
             $parametros['EstudanteMobOut_Curso'] = $mobStd->EstudanteMobOut_Curso;
             $parametros['EstudanteMobOut_Matricula'] = $mobStd->EstudanteMobOut_Matricula;
             $parametros['EstudanteMobOut_Modalidade'] = $mobStd->EstudanteMobOut_Modalidade;
             $parametros['EstudanteMobOut_cpf'] = $mobStd->EstudanteMobOut_cpf;
             $parametros['EstudanteMobOut_identidade'] = $mobStd->EstudanteMobOut_identidade;
             $parametros['EstudanteMobOut_celular'] = $mobStd->EstudanteMobOut_celular;
             $parametros['EstudanteMobOut_endereco'] = $mobStd->EstudanteMobOut_endereco;
             $parametros['EstudanteMobOut_nomeFamiliar'] = $mobStd->EstudanteMobOut_nomeFamiliar;
             $parametros['EstudanteMobOut_TelefoneFamiliar'] = $mobStd->EstudanteMobOut_TelefoneFamiliar;
             $parametros['EstudanteMobOut_EmailFamiliar'] = $mobStd->EstudanteMobOut_EmailFamiliar;
             $parametros['EstudanteMobOut_GrauParentesco'] = $mobStd->EstudanteMobOut_GrauParentesco;
             $parametros['EstudanteMobOut_DataSaida'] = $mobStd->EstudanteMobOut_DataSaida;
             $parametros['EstudanteMobOut_DataRetorno'] = $mobStd->EstudanteMobOut_DataRetorno;
             $parametros['EstudanteMobOut_auxilioFinanceiro'] = $mobStd->EstudanteMobOut_auxilioFinanceiro;
             $parametros['EstudanteMobOut_TipoAuxilio'] = $mobStd->EstudanteMobOut_TipoAuxilio;
             $parametros['EstudanteMobOut_DescTipoAuxilio'] = $mobStd->EstudanteMobOut_DescTipoAuxilio;
             $parametros['EstudanteMobOut_FinalidadeIntercambio'] = $mobStd->EstudanteMobOut_FinalidadeIntercambio;
			
	   

			$conteudo = $template->render($parametros);
			echo $conteudo;

		}

		public function Update(){ // alterar do banco de dados do banco de dados 

			try{
				
				MobOutEstudante::updateMobOutStudent($_POST); // chama a função que esta no model para alterar
               
				echo json_encode(array('status' => 'success', 'message' => "Estudante alterado com sucesso!"));
				echo '<script>location.href="/?pagina=MobOut&metodo=index"</script>';
			}
			 catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				
                 echo '<script>location.href="/?pagina=MobOut&metodo=Mudar&id'.$_POST['idEstudante'] .'"</script>';
			}
		}
    }
