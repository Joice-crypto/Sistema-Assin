<?php

	class AcordosController
	{
		public function index($params)
		{



			try {
				$colecAcord = Acordos::selecionaPorId($params); // aqui vai aparecer todos os meus Acorods Internacionais


				$loader = new \Twig\Loader\FilesystemLoader('app/View');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('AcordosInternacionais.html');

				$parametros = array();
				$parametros['id'] = $colecAcord->id;
				$parametros['NomeInstituicao'] = $colecAcord->NomeInstituicao;
				$parametros['PaisInstituicao'] = $colecAcord->PaisInstituicao;
				$parametros['EnderecoInst']= $colecAcord->EnderecoInst;
				$parametros['Continente']= $colecAcord->Continente;
				$parametros['AcStatus']= $colecAcord->AcStatus;
				$parametros['AreaDeCoberturaAcordo']= $colecAcord->AreaDeCoberturaAcordo;
				$parametros['NomeCoordenador']= $colecAcord->NomeCoordenador;
				$parametros['dataAssinatura']= $colecAcord->dataAssinatura;
				$parametros['dataExpiracao']= $colecAcord->dataExpiracao;
				$parametros['periodoVigencia']= $colecAcord->periodoVigencia;
				$parametros['numeroDoProcesso']= $colecAcord->numeroDoProcesso;
				$parametros['TermosAditivos']= $colecAcord->TermosAditivos;
				$parametros['StatusRenovacao']= $colecAcord->StatusRenovacao;
				$parametros['DOU']= $colecAcord->DOU;
				$parametros['dataRenocavao']= $colecAcord->dataRenocavao;
				$parametros['atividadesPrevistas']= $colecAcord->atividadesPrevistas;
				$parametros['publicoAlvo']= $colecAcord->publicoAlvo;
				$parametros['AcordosInternacionaisResFK']= $colecAcord->AcordosInternacionaisResFK;
				//var_dump($colecPostagens);

				$conteudo = $template->render($parametros);
				echo $conteudo;		
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			
		}
	}