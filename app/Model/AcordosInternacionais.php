<?php

class Acordos 
{

    public static function getAllAgreements(){ // PEGAR TODOS OS ACORDOS
        $con = Connection::getConn();

       // $sql = "SELECT * from `AcordosInternacionais`  ORDER BY idAcordos DESC";
     

   
        $sql = "SELECT * from `Responsaveis`  AS res INNER JOIN `AcordosInternacionais` AS ai on (res.AcordosInterFK = AI.idAcordos)";
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

			$sql = "SELECT * from `AcordosInternacionais` AS AI inner join `Responsaveis` as res on (res.AcordosInterFK = AI.idAcordos) WHERE idAcordos = :idAcordos";

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
			if (empty($dadosPost['NomeInstituicao']) or empty($dadosPost['PaisInstituicao']) or empty($dadosPost['EnderecoInst'])
            or empty($dadosPost['Continente']) or empty($dadosPost['AcStatus']) or empty($dadosPost['AreaDeCoberturaAcordo']) or empty($dadosPost['NomeCoordenador']) or empty($dadosPost['dataAssinatura'])
            or empty($dadosPost['dataExpiracao']) or empty($dadosPost['periodoVigencia']) or empty($dadosPost['numeroDoProcesso']) or empty($dadosPost['TermosAditivos'])
            or empty($dadosPost['StatusRenovacao'])  or empty($dadosPost['DOU'])  or empty($dadosPost['dataRenovacao']) or empty($dadosPost['atividadesPrevistas']) 
            or empty($dadosPost['publicoAlvo']) or empty($dadosPost['NomeResponsavel']) or empty($dadosPost['FuncaoResponsavel']) or empty($dadosPost['TelefoneResponsavel'])
            or empty($dadosPost['ResponsavelEmail'])) // tem que preencher todos os campo 
            { 
            	throw new Exception("Preencha todos os campos");

				return false;
			}

			$con = Connection::getConn();
        


            $sql = $con->prepare('INSERT INTO AcordosInternacionais (NomeInstituicao,PaisInstituicao,EnderecoInst,Continente,AcStatus,AreaDeCoberturaAcordo,
            NomeCoordenador,dataAssinatura,dataExpiracao,periodoVigencia,numeroDoProcesso,TermosAditivos,StatusRenovacao,DOU,dataRenovacao,atividadesPrevistas,
            publicoAlvo) VALUES (:NomeInstituicao,:PaisInstituicao,:EnderecoInst,:Continente,:AcStatus,:AreaDeCoberturaAcordo,:NomeCoordenador,:dataAssinatura,
            :dataExpiracao,:periodoVigencia,:numeroDoProcesso,:TermosAditivos,:StatusRenovacao,:DOU,:dataRenovacao,:atividadesPrevistas,:publicoAlvo)'); 

			$sql->bindValue(':NomeInstituicao', $dadosPost['NomeInstituicao'], PDO::PARAM_STR);
            $sql->bindValue(':PaisInstituicao', $dadosPost['PaisInstituicao'],PDO::PARAM_STR);
            $sql->bindValue(':EnderecoInst', $dadosPost['EnderecoInst'], PDO::PARAM_STR);
            $sql->bindValue(':Continente', $dadosPost['Continente'],PDO::PARAM_STR);
            $sql->bindValue(':AcStatus', $dadosPost['AcStatus'],PDO::PARAM_STR);
            $sql->bindValue(':AreaDeCoberturaAcordo', $dadosPost['AreaDeCoberturaAcordo'],PDO::PARAM_STR);
            $sql->bindValue(':NomeCoordenador', $dadosPost['NomeCoordenador'],PDO::PARAM_STR);
            $sql->bindValue(':dataAssinatura', $dadosPost['dataAssinatura'],PDO::PARAM_STR);
            $sql->bindValue(':dataExpiracao', $dadosPost['dataExpiracao'],PDO::PARAM_STR);
            $sql->bindValue(':periodoVigencia', $dadosPost['periodoVigencia'],PDO::PARAM_STR);
            $sql->bindValue(':numeroDoProcesso', $dadosPost['numeroDoProcesso'],PDO::PARAM_INT);
            $sql->bindValue(':TermosAditivos', $dadosPost['TermosAditivos'],PDO::PARAM_STR);
            $sql->bindValue(':StatusRenovacao', $dadosPost['StatusRenovacao'],PDO::PARAM_STR);
            $sql->bindValue(':DOU', $dadosPost['DOU'],PDO::PARAM_STR);
            $sql->bindValue(':dataRenovacao', $dadosPost['dataRenovacao'],PDO::PARAM_STR);
            $sql->bindValue(':atividadesPrevistas', $dadosPost['atividadesPrevistas'],PDO::PARAM_STR);
            $sql->bindValue(':publicoAlvo', $dadosPost['publicoAlvo'],PDO::PARAM_STR);

            if ($sql->execute()) {
                $ID = $con->lastInsertId();
                    $sql2 = $con->prepare('INSERT INTO Responsaveis (NomeResponsavel,FuncaoResponsavel,TelefoneResponsavel,ResponsavelEmail,AcordosInterFK) VALUES (?,?,?,?,?)');
                    $sql2->bindValue(1, $dadosPost['NomeResponsavel'], PDO::PARAM_STR);
                    $sql2->bindValue(2, $dadosPost['FuncaoResponsavel'], PDO::PARAM_STR);
                    $sql2->bindValue(3, $dadosPost['TelefoneResponsavel'], PDO::PARAM_STR);
                    $sql2->bindValue(4, $dadosPost['ResponsavelEmail'], PDO::PARAM_STR);
                    $sql2->bindValue(5,$ID, PDO::PARAM_INT);

                
            }
            // fiz uma relação de 1-n resposaveis tem AcordosInterFK
             			
			$res =  $sql2->execute();
               
                if ($res == 0) {
                 
                    throw new Exception("Falha ao cadastrar acordo");

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
            DOU = :DOU, dataRenocavao = :dataRenocavao, atividadesPrevistas = :atividadesPrevistas, publicoAlvo = :publicoAlvo; FROM AcordosInternacionais JOIN Responsaveis
            on NomeResponsavel = :NomeResponsavel, FuncaoResponsavel = :FuncaoResponsavel, TelefoneResponsavel = :TelefoneResponsavel, ResponsavelEmail = :ResponsavelEmail
            WHERE AcordosInterFK = :idAcordos";
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
            $sql->bindValue(':publicoAlvo', $params['publicoAlvo']);
            $sql->bindValue(':NomeResponsavel', $params['NomeResponsavel']);
            $sql->bindValue(':FuncaoResponsavel', $params['FuncaoResponsavel']);
            $sql->bindValue(':TelefoneResponsavel', $params['TelefoneResponsavel']);
            $sql->bindValue(':ResponsavelEmail', $params['ResponsavelEmail']);
			

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

             $sql = "DELETE FROM Responsaveis WHERE AcordosInterFK = :idAcordo";
             $sql = $con->prepare($sql);
                    $sql->bindValue(':idAcordo',$idAcordo);
                    $resultado = $sql->execute();

             if($sql->execute()) {
                
                    $sql2 = "DELETE FROM AcordosInternacionais WHERE idAcordos = :idAcordo";
                    $sql2 = $con->prepare($sql2);
                    $sql2->bindValue(':idAcordo',$idAcordo);
                    $resultado = $sql2->execute();
             }

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar acordo");

				return false;
			}

			return true;
		}
    }