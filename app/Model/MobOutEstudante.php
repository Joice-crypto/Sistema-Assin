<?php

class MobOutEstudante
{

    public static function getAllMobilidades(){ // PEGAR TODas as nmobilidades

        $con = Connection::getConn();
         
         $sql = "SELECT * from `EstudanteMobOut`  ORDER BY idEstudante DESC";
         $sql = $con->prepare($sql);
         $sql->execute();
 
         $resultado = array();
 
         while ($row = $sql->fetchObject('MobOutEstudante')) {
             $resultado[] = $row;
         
         }
 
         if (!$resultado) {
             throw new Exception("Não foi encontrado nenhum registro no banco de dados");		
         }
 
         return $resultado;
       

    }
    public static function GetMobilidadeById($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * from `EstudanteMobOut` WHERE idEstudante = :idEstudante";
        $sql = $con->prepare($sql);
		$sql->bindValue(':idEstudante', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = $sql->fetchObject('MobOutEstudante');

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco");	
			} else {
				$resultado;
			}

			return $resultado;


        return $resultado;

    }
    public static function insertMobOutStudent($dadosPost) // INSERIR mobilidade out estudante
	    {
           // verifica se todos os campos foram setados
          
			if (empty($dadosPost['EstudanteMobOut_InstituicaoDest']) or empty($dadosPost['EstudanteMobOut_PaisDest']) or empty($dadosPost['EstudanteMobOut_Programa']) or empty($dadosPost['EstudanteMobOut_Campus'])
            or empty($dadosPost['EstudanteMobOut_Grau']) or empty($dadosPost['EstudanteMobOut_Nome']) or empty($dadosPost['EstudanteMobOut_Curso']) or empty($dadosPost['EstudanteMobOut_Matricula'])
            or empty($dadosPost['EstudanteMobOut_Modalidade']) or empty($dadosPost['EstudanteMobOut_cpf']) or empty($dadosPost['EstudanteMobOut_identidade']) or empty($dadosPost['EstudanteMobOut_email'])  
            or empty($dadosPost['EstudanteMobOut_celular'])  or empty($dadosPost['EstudanteMobOut_endereco']) or empty($dadosPost['EstudanteMobOut_nomeFamiliar']) or empty($dadosPost['EstudanteMobOut_TelefoneFamiliar']) 
            or empty($dadosPost['EstudanteMobOut_EmailFamiliar']) or empty($dadosPost['EstudanteMobOut_GrauParentesco']) or empty($dadosPost['EstudanteMobOut_DataSaida'] )
            or empty($dadosPost['EstudanteMobOut_DataSaida`']) or empty($dadosPost['EstudanteMobOut_DataRetorno']) or empty($dadosPost['EstudanteMobOut_auxilioFinanceiro']) or empty($dadosPost['EstudanteMobOut_TipoAuxilio'])
            or empty($dadosPost['EstudanteMobOut_DescTipoAuxilio']) or empty($dadosPost['EstudanteMobOut_FinalidadeIntercambio'])) // tem que preencher todos os campo 
            { 
            	throw new Exception(" todos os campos");

				return false;
			}
            // FAZER O INSERIR ARQ


			$con = Connection::getConn();
            
           

            $sql = $con->prepare('INSERT INTO EstudanteMobOut (EstudanteMobOut_InstituicaoDest,EstudanteMobOut_PaisDest,EstudanteMobOut_CartaAceitacao,EstudanteMobOut_Programa,
            EstudanteMobOut_Campus,EstudanteMobOut_Grau,EstudanteMobOut_Nome,EstudanteMobOut_Curso,EstudanteMobOut_Matricula,EstudanteMobOut_Modalidade,EstudanteMobOut_cpf,
            EstudanteMobOut_identidade,EstudanteMobOut_email,EstudanteMobOut_celular,EstudanteMobOut_endereco,EstudanteMobOut_nomeFamiliar,EstudanteMobOut_TelefoneFamiliar,
            EstudanteMobOut_EmailFamiliar,EstudanteMobOut_GrauParentesco,EstudanteMobOut_DataSaida,EstudanteMobOut_DataRetorno,EstudanteMobOut_auxilioFinanceiro,
            EstudanteMobOut_TipoAuxilio,EstudanteMobOut_DescTipoAuxilio,EstudanteMobOut_FinalidadeIntercambio VALUES (:EstudanteMobOut_InstituicaoDest,:EstudanteMobOut_PaisDest,:EstudanteMobOut_CartaAceitacao,:EstudanteMobOut_Programa,
            :EstudanteMobOut_Campus,:EstudanteMobOut_Grau,:EstudanteMobOut_Nome,:EstudanteMobOut_Curso,:EstudanteMobOut_Matricula,:EstudanteMobOut_Modalidade,:EstudanteMobOut_cpf,
            :EstudanteMobOut_identidade,:EstudanteMobOut_email,:EstudanteMobOut_celular,:EstudanteMobOut_endereco,:EstudanteMobOut_nomeFamiliar,:EstudanteMobOut_TelefoneFamiliar,
            :EstudanteMobOut_EmailFamiliar,:EstudanteMobOut_GrauParentesco,:EstudanteMobOut_DataSaida,:EstudanteMobOut_DataRetorno,:EstudanteMobOut_auxilioFinanceiro,
            :EstudanteMobOut_TipoAuxilio,:EstudanteMobOut_DescTipoAuxilio,:EstudanteMobOut_FinalidadeIntercambio)'); 


            $sql->bindValue(':EstudanteMobOut_InstituicaoDest', $dadosPost['EstudanteMobOut_InstituicaoDest'], PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_PaisDest', $dadosPost['EstudanteMobOut_PaisDest'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_CartaAceitacao', $dadosPost['EstudanteMobOut_CartaAceitacao'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Programa', $dadosPost['EstudanteMobOut_Programa'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Campus', $dadosPost['EstudanteMobOut_Campus'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Grau', $dadosPost['EstudanteMobOut_Grau'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Nome', $dadosPost['EstudanteMobOut_Nome'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Curso', $dadosPost['EstudanteMobOut_Curso'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Matricula', $dadosPost['EstudanteMobOut_Matricula'],PDO::PARAM_INT);
            $sql->bindValue(':EstudanteMobOut_Modalidade', $dadosPost['EstudanteMobOut_Modalidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_cp', $dadosPost['EstudanteMobOut_cp'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_identidade', $dadosPost['EstudanteMobOut_identidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_email', $dadosPost['EstudanteMobOut_email'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_endereco', $dadosPost['EstudanteMobOut_endereco'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_celular', $dadosPost['EstudanteMobOut_celular'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_nomeFamiliar', $dadosPost['EstudanteMobOut_nomeFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_TelefoneFamiliar', $dadosPost['EstudanteMobOut_TelefoneFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_EmailFamiliar', $dadosPost['EstudanteMobOut_EmailFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_GrauParentesco', $dadosPost['EstudanteMobOut_GrauParentesco'],PDO::PARAM_STR);    
            $sql->bindValue(':EstudanteMobOut_DataSaida', $dadosPost['EstudanteMobOut_DataSaida'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_DataRetorno', $dadosPost['EstudanteMobOut_DataRetorno'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_auxilioFinanceiro', $dadosPost['EstudanteMobOut_auxilioFinanceiro'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_TipoAuxilio', $dadosPost['EstudanteMobOut_TipoAuxilio'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_DescTipoAuxilio', $dadosPost['EstudanteMobOut_DescTipoAuxilio'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_FinalidadeIntercambio', $dadosPost['EstudanteMobOut_FinalidadeIntercambio'],PDO::PARAM_STR);

            $res =  $sql->execute();
            
              
            if ($res == 0) {
                 
                throw new Exception("Falha ao cadastrar aluno");

                return false;
            }
                  
            return true;

	    }


}
