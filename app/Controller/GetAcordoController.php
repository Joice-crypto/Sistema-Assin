<?php 

class getAcordoController {

    public function index($params){

       
        
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
            $parametros['dataRenocavao']= $acordo->dataRenocavao;
            $parametros['atividadesPrevistas']= $acordo->atividadesPrevistas;
            $parametros['publicoAlvo']= $acordo->publicoAlvo;
            $parametros['AcordosInternacionaisResFK']= $acordo->AcordosInternacionaisResFK;
        //   var_dump($parametros);
    
            $conteudo = $template->render($parametros);
            echo $conteudo;		
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }

}

