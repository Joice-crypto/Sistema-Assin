
<?php

require_once('app\Model\MobOutServidor.php');


class MobOutController
{
    public function index()
    {

        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MobOut.html'); // apenas vai carregar a pagina inicial
            $parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    // AQUI COMEÇA O DE SERVIDOR
    public function getAllMobOutServidor(){
        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MOProfessor.html'); 
            $colecMobEst = MobOutServidor::getAllMobilidades();
             $parametros = array();
             $parametros['MobOutServidor'] = $colecMobEst;
             
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function GetMobilidadeServidor($params){ // vai pegar apenas um acordo 

        
        try {
            $mobilidade = MobOutServidor::GetMobilidadeById($params); // aqui vai aparecer um acordo selecionado por ID 
            
    
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('GetMobilidade.html');
    
            $parametros = array();
            $parametros['idEstudante'] = $mobilidade->idEstudante;
            $parametros['EstudanteMobOut_InstituicaoDest'] = $mobilidade->EstudanteMobOut_InstituicaoDest;
            $parametros['EstudanteMobOut_PaisDest'] = $mobilidade->EstudanteMobOut_PaisDest;
            $parametros['EstudanteMobOut_CartaAceitacao'] = $mobilidade->EstudanteMobOut_CartaAceitacao;
            $parametros['EstudanteMobOut_Programa'] = $mobilidade->EstudanteMobOut_Programa;
            $parametros['EstudanteMobOut_email'] = $mobilidade->EstudanteMobOut_email;
            $parametros['EstudanteMobOut_Campus'] = $mobilidade->EstudanteMobOut_Campus;
            $parametros['EstudanteMobOut_Grau'] = $mobilidade->EstudanteMobOut_Grau;
            $parametros['EstudanteMobOut_Nome'] = $mobilidade->EstudanteMobOut_Nome;
            $parametros['EstudanteMobOut_Curso'] = $mobilidade->EstudanteMobOut_Curso;
            $parametros['EstudanteMobOut_Matricula'] = $mobilidade->EstudanteMobOut_Matricula;
            $parametros['EstudanteMobOut_Modalidade'] = $mobilidade->EstudanteMobOut_Modalidade;
            $parametros['EstudanteMobOut_cpf'] = $mobilidade->EstudanteMobOut_cpf;
            $parametros['EstudanteMobOut_identidade'] = $mobilidade->EstudanteMobOut_identidade;
            $parametros['EstudanteMobOut_celular'] = $mobilidade->EstudanteMobOut_celular;
            $parametros['EstudanteMobOut_endereco'] = $mobilidade->EstudanteMobOut_endereco;
            $parametros['EstudanteMobOut_nomeFamiliar'] = $mobilidade->EstudanteMobOut_nomeFamiliar;
            $parametros['EstudanteMobOut_TelefoneFamiliar'] = $mobilidade->EstudanteMobOut_TelefoneFamiliar;
            $parametros['EstudanteMobOut_EmailFamiliar'] = $mobilidade->EstudanteMobOut_EmailFamiliar;
            $parametros['EstudanteMobOut_GrauParentesco'] = $mobilidade->EstudanteMobOut_GrauParentesco;
            $parametros['EstudanteMobOut_DataSaida'] = $mobilidade->EstudanteMobOut_DataSaida;
            $parametros['EstudanteMobOut_DataRetorno'] = $mobilidade->EstudanteMobOut_DataRetorno;
            $parametros['EstudanteMobOut_auxilioFinanceiro'] = $mobilidade->EstudanteMobOut_auxilioFinanceiro;
            $parametros['EstudanteMobOut_TipoAuxilio'] = $mobilidade->EstudanteMobOut_TipoAuxilio;
            $parametros['EstudanteMobOut_DescTipoAuxilio'] = $mobilidade->EstudanteMobOut_DescTipoAuxilio;
            $parametros['EstudanteMobOut_FinalidadeIntercambio'] = $mobilidade->EstudanteMobOut_FinalidadeIntercambio;
            
            $conteudo = $template->render($parametros);
            echo $conteudo;		
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }

    // AQUI COMEÇA O DE ESTUDANTE
    public function getAllMobOutStudents()
    {

        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MOEstudante.html'); // apenas vai carregar a pagina inicial DE ESTUDANTES
            $colecMobEst = MobOutEstudante::getAllMobilidades();
             $parametros = array();
             $parametros['MobOutEstudante'] = $colecMobEst;
             
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function GetMobilidade($params){ // vai pegar apenas um acordo 

       
        
        try {
            $mobilidade = MobOutEstudante::GetMobilidadeById($params); // aqui vai aparecer um acordo selecionado por ID 
            
    
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('GetMobilidade.html');
    
            $parametros = array();
            $parametros['idEstudante'] = $mobilidade->idEstudante;
            $parametros['EstudanteMobOut_InstituicaoDest'] = $mobilidade->EstudanteMobOut_InstituicaoDest;
            $parametros['EstudanteMobOut_PaisDest'] = $mobilidade->EstudanteMobOut_PaisDest;
            $parametros['EstudanteMobOut_CartaAceitacao'] = $mobilidade->EstudanteMobOut_CartaAceitacao;
            $parametros['EstudanteMobOut_Programa'] = $mobilidade->EstudanteMobOut_Programa;
            $parametros['EstudanteMobOut_email'] = $mobilidade->EstudanteMobOut_email;
            $parametros['EstudanteMobOut_Campus'] = $mobilidade->EstudanteMobOut_Campus;
            $parametros['EstudanteMobOut_Grau'] = $mobilidade->EstudanteMobOut_Grau;
            $parametros['EstudanteMobOut_Nome'] = $mobilidade->EstudanteMobOut_Nome;
            $parametros['EstudanteMobOut_Curso'] = $mobilidade->EstudanteMobOut_Curso;
            $parametros['EstudanteMobOut_Matricula'] = $mobilidade->EstudanteMobOut_Matricula;
            $parametros['EstudanteMobOut_Modalidade'] = $mobilidade->EstudanteMobOut_Modalidade;
            $parametros['EstudanteMobOut_cpf'] = $mobilidade->EstudanteMobOut_cpf;
            $parametros['EstudanteMobOut_identidade'] = $mobilidade->EstudanteMobOut_identidade;
            $parametros['EstudanteMobOut_celular'] = $mobilidade->EstudanteMobOut_celular;
            $parametros['EstudanteMobOut_endereco'] = $mobilidade->EstudanteMobOut_endereco;
            $parametros['EstudanteMobOut_nomeFamiliar'] = $mobilidade->EstudanteMobOut_nomeFamiliar;
            $parametros['EstudanteMobOut_TelefoneFamiliar'] = $mobilidade->EstudanteMobOut_TelefoneFamiliar;
            $parametros['EstudanteMobOut_EmailFamiliar'] = $mobilidade->EstudanteMobOut_EmailFamiliar;
            $parametros['EstudanteMobOut_GrauParentesco'] = $mobilidade->EstudanteMobOut_GrauParentesco;
            $parametros['EstudanteMobOut_DataSaida'] = $mobilidade->EstudanteMobOut_DataSaida;
            $parametros['EstudanteMobOut_DataRetorno'] = $mobilidade->EstudanteMobOut_DataRetorno;
            $parametros['EstudanteMobOut_auxilioFinanceiro'] = $mobilidade->EstudanteMobOut_auxilioFinanceiro;
            $parametros['EstudanteMobOut_TipoAuxilio'] = $mobilidade->EstudanteMobOut_TipoAuxilio;
            $parametros['EstudanteMobOut_DescTipoAuxilio'] = $mobilidade->EstudanteMobOut_DescTipoAuxilio;
            $parametros['EstudanteMobOut_FinalidadeIntercambio'] = $mobilidade->EstudanteMobOut_FinalidadeIntercambio;
            
            $conteudo = $template->render($parametros);
            echo $conteudo;		
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }



    public function create() // vou chamar a pagina de criar um aluno em mobilidade out
		{
			
			$loader = new \Twig\Loader\FilesystemLoader('app/View/');
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

			
			$loader = new \Twig\Loader\FilesystemLoader('app/View/');
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
