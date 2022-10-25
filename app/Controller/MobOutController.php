
<?php



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
    public function getAllMobOutStudents()
    {

        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MOEstudante.html'); // apenas vai carregar a pagina inicial
            $colecMobEst = MobOutEstudante::getAllMobilidades();
            $parametros = array();
            $parametros['MobOutEstudante'] = $colecMobEst;
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function GetMobilidadeOutEstud($params){ // vai pegar apenas um acordo 

       
        
        try {
            $mobilidade = MobOutEstudante::GetMobilidade($params); // aqui vai aparecer um acordo selecionado por ID 
            
    
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('GetMobilidade.html');
    
            $parametros = array();
            $parametros['idEstudante'] = $mobilidade->idEstudante;
            $parametros['EstudanteMobOut_InstituicaoDest'] = $mobilidade->EstudanteMobOut_InstituicaoDest;
            $parametros['EstudanteMobOut_PaisDest'] = $mobilidade->EstudanteMobOut_PaisDest;
            $parametros['EstudanteMobOut_CartaAceitacao'] = $mobilidade->EstudanteMobOut_CartaAceitacao;
            $parametros['EstudanteMobOut_Programa'] = $mobilidade->EstudanteMobOut_Programa;
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
			$template = $twig->load('FormsMobilidadeOutEst.html'); // vai carregar a pagina de acordos da view

			$parametros = array();


			$conteudo = $template->render($parametros);
			echo $conteudo;

	
		}

    // TERMINAR OS OUTROS METODOS AMANHA 
   
}
