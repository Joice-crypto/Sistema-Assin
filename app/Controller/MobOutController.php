
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
            $colecMobEst = MobOutServidor::getAllMobilidades(); // pega todos os servidores em mobilidade
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
            $template = $twig->load('GetMobilidadeServidor.html');
    
            $parametros = array();
            $parametros['idServidor'] = $mobilidade->idEstudante;
            $parametros['Servidor_InstituicaoDest'] = $mobilidade->Servidor_InstituicaoDest;
            $parametros['Servidor_PaisDest'] = $mobilidade->Servidor_PaisDest;
            $parametros['Servidor_Cargo'] = $mobilidade->Servidor_Cargo;
            $parametros['Servidor_Campus'] = $mobilidade->Servidor_Campus;
            $parametros['Servidor_Nome'] = $mobilidade->Servidor_Nome;
            $parametros['Servidor_Matricula'] = $mobilidade->Servidor_Matricula;
            $parametros['Servidor_Periodo'] = $mobilidade->Servidor_Periodo;
            $parametros['Servidor_cpf'] = $mobilidade->Servidor_cpf;
            $parametros['Servidor_identidade'] = $mobilidade->Servidor_identidade;
            $parametros['Servidor_email'] = $mobilidade->Servidor_email;
            $parametros['Servidor_celular'] = $mobilidade->Servidor_celular;
            $parametros['Servidor_endereco'] = $mobilidade->Servidor_endereco;
            $parametros['Servidor_DataSaida'] = $mobilidade->Servidor_DataSaida;
            $parametros['Servidor_DataRetorno'] = $mobilidade->Servidor_DataRetorno;
            $parametros['Servidor_EnderExterior'] = $mobilidade->Servidor_EnderExterior;

            $parametros['idProfessor'] = $mobilidade->idProfessor;
            $parametros['CursoProfessor'] = $mobilidade->CursoProfessor;
            $parametros['CampusProfessor'] = $mobilidade->CampusProfessor;
            $parametros['InteressesProfessor'] = $mobilidade->InteressesProfessor;
            $parametros['TitulacaoProfessor'] = $mobilidade->TitulacaoProfessor;
 
            $parametros['idTecnico'] = $mobilidade->idTecnico;
            $parametros['SetorTecnico'] = $mobilidade->SetorTecnico;
            $parametros['CampusTecnico'] = $mobilidade->CampusTecnico;
            $parametros['InteressesTecnico'] = $mobilidade->InteressesTecnico;
            $parametros['AreaTecnico'] = $mobilidade->AreaTecnico;
            
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
    public function GetMobilidade($params){ // vai pegar apenas um

       
        
        try {
            $mobilidade = MobOutEstudante::GetMobilidadeById($params); // aqui vai aparecer um  selecionado por ID 
            
    
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

 
   
}
