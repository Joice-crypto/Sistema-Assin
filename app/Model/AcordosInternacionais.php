<?php

class Acordos 
{

    public static function getAllAgreements(){ // PEGAR TODOS OS ACORDOS
        $con = Connection::getConn();

        $sql = "SELECT * FROM AcordosInternacionais ORDER BY idAcordos DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Acordos')) {
            $resultado[] = $row;
        }

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco de dados");		
        }

        return $resultado;

    }

    public static function selecionaPorId($idPost) // vai selecionar cada acordo por id 
    {
        $con = Connection::getConn();

			$sql = "SELECT * FROM AcordosInternacionais WHERE idAcordos = :idAcordos";
			$sql = $con->prepare($sql);
			$sql->bindValue(':idAcordos', $idPost, PDO::PARAM_INT);
			$sql->execute();

			$resultado = $sql->fetchObject('Acordos');

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco");	
			} else {
				$resultado;
			}

			return $resultado;


        return $resultado;
    }



    public static function insertAgreements($dadosPost) // INSERIR ACORDO 
	    {
            // verifica se todos os campos foram setados
			if (!isset($dadosPost['NomeInstituicao']) or !isset($dadosPost['PaisInstituicao']) or !isset($dadosPost['EnderecoInst']) or !isset($dadosPost['Continente'])
            or !isset($dadosPost['AcStatus']) or !isset($dadosPost['AreaDeCoberturaAcordo']) or !isset($dadosPost['NomeCoordenador']) or !isset($dadosPost['dataAssinatura'])
            or !isset($dadosPost['dataExpiracao']) or !isset($dadosPost['periodoVigencia']) or !isset($dadosPost['numeroDoProcesso']) or !isset($dadosPost['TermosAditivos'])
            or !isset($dadosPost['StatusRenovacao'])  or !isset($dadosPost['DOU'])  or !isset($dadosPost['dataRenocavao']) or !isset($dadosPost['atividadesPrevistas']) or
            !isset($dadosPost['publicoAlvo'])) // tem que preencher todos os campo 
            { 
            	throw new Exception("Preencha todos os campos");

				return false;
			}

			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO AcordosInternacionais (NomeInstituicao, PaisInstituicao,EnderecoInst,Continente,AcStatus,AreaDeCoberturaAcordo,
            NomeCoordenador,dataAssinatura,dataExpiracao,periodoVigencia,numeroDoProcesso,TermosAditivos,StatusRenovacao,DOU,dataRenocavao,atividadesPrevistas,
            publicoAlvo,AcordosInternacionaisResFK) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'); 

			$sql->bindValue(':NomeInstituicao', $dadosPost['NomeInstituicao']);
            $sql->bindValue(':PaisInstituicao', $dadosPost['PaisInstituicao']);
            $sql->bindValue(':EnderecoInst', $dadosPost['EnderecoInst']);
            $sql->bindValue(':Continente', $dadosPost['Continente']);
            $sql->bindValue(':AcStatus', $dadosPost['AcStatus']);
            $sql->bindValue(':AreaDeCoberturaAcordo', $dadosPost['AreaDeCoberturaAcordo']);
            $sql->bindValue(':NomeCoordenador', $dadosPost['NomeCoordenador']);
            $sql->bindValue(':dataAssinatura', $dadosPost['dataAssinatura']);
            $sql->bindValue(':dataExpiracao', $dadosPost['dataExpiracao']);
            $sql->bindValue(':periodoVigencia', $dadosPost['periodoVigencia']);
            $sql->bindValue(':numeroDoProcesso', $dadosPost['numeroDoProcesso']);
            $sql->bindValue(':TermosAditivos', $dadosPost['TermosAditivos']);
            $sql->bindValue(':StatusRenovacao', $dadosPost['StatusRenovacao']);
            $sql->bindValue(':DOU', $dadosPost['DOU']);
            $sql->bindValue(':dataRenocavao', $dadosPost['dataRenocavao']);
            $sql->bindValue(':atividadesPrevistas', $dadosPost['atividadesPrevistas']);
            $sql->bindValue(':publicoAlvo,', $dadosPost['publicoAlvo']);
            
             			
			$res = $sql->execute();

			if ($res == 0) {
				throw json_encode(array("status" => "failure", "message" => "Não foi possível cadastrar o Acordo."));
                exit();

				return false;
			}

			return true;
	    }
        public static function updateAgreements($params) // EDITAR UM ACORDO
		{
			$con = Connection::getConn();

			$sql = "UPDATE AcordosInternacionais SET NomeInstituicao = :nomeInstituicao,PaisInstituicao =:PaisInstituicao,EnderecoInst = :EnderecoInst,
            Continente = :Continente,AcStatus = :AcStatus, AreaDeCoberturaAcordo = :AreaDeCoberturaAcordo, NomeCoordenador = :NomeCoordenador, dataAssinatura = :dataAssinatura,
            dataExpiraçao = :dataExpiraçao, periodoVigencia = :periodoVigencia, numeroDoProcesso = :numeroDoProcesso, TermosAditivos = :TermosAditivos, StatusRenovacao = :StatusRenovacao,
            DOU = :DOU, dataRenocavao = :dataRenocavao, atividadesPrevistas = :atividadesPrevistas, publicoAlvo = :publicoAlvo, AcordosInternacionaisResFK = :AcordosInternacionaisResFK ;  WHERE idAcordos = :idAcordos";
			$sql = $con->prepare($sql);
            $sql->bindValue(':nomeInstituicao', $params['NomeInstituicao']);
            $sql->bindValue(':PaisInstituicao', $params['PaisInstituicao']);
            $sql->bindValue(':EnderecoInst', $params['EnderecoInst']);
            $sql->bindValue(':Continente', $params['Continente']);
            $sql->bindValue(':AcStatus', $params['AcStatus']);
            $sql->bindValue(':AreaDeCoberturaAcordo', $params['AreaDeCoberturaAcordo']);
            $sql->bindValue(':NomeCoordenador', $params['NomeCoordenador']);
            $sql->bindValue(':dataAssinatura', $params['dataAssinatura']);
            $sql->bindValue(':dataExpiraçao', $params['dataExpiraçao']);
            $sql->bindValue(':periodoVigencia', $params['periodoVigencia']);
            $sql->bindValue(':numeroDoProcesso', $params['numeroDoProcesso']);
            $sql->bindValue(':TermosAditivos', $params['TermosAditivos']);
            $sql->bindValue(':StatusRenovacao', $params['StatusRenovacao']);
            $sql->bindValue(':DOU', $params['DOU']);
            $sql->bindValue(':dataRenocavao', $params['dataRenocavao']);
            $sql->bindValue(':atividadesPrevistas', $params['atividadesPrevistas']);
            $sql->bindValue(':publicoAlvo,', $params['publicoAlvo']);
            $sql->bindValue(':AcordosInternacionaisResFK', $params['AcordosInternacionaisResFK']);
			$sql->bindValue(':idAcordos', $params['idAcordos']);

			$resultado = $sql->execute();

			if ($resultado == 0) {
				throw new Exception("Falha ao alterar acordo");

				return false;
			}

			return true;
		}
        public static function deleteAgreements($idAcordo) 
		{
			$con = Connection::getConn();

			$sql = "DELETE FROM AcordosInternacionais WHERE idAcordos = :idAcordo";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id',$idAcordo);
			$resultado = $sql->execute();

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar publicação");

				return false;
			}

			return true;
		}
    }