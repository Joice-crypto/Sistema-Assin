<?php

require_once("panel\app\Model\File.php");

class MobOutEstudante
{

    public static function getAllMobilidades(){ // PEGAR TODas as nmobilidades

        $con = Connection::getConn();
         
         $sql = "SELECT * from `EstudanteMobOut`";
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

    }
    public static function insertMobOutStudent($dadosPost) // INSERIR mobilidade out estudante
	    {

            $con = Connection::getConn();
     
          
			if (empty($dadosPost['EstudanteMobOut_InstituicaoDest']) or empty($dadosPost['EstudanteMobOut_PaisDest']) or empty($dadosPost['EstudanteMobOut_Programa']) 
            or empty($dadosPost['EstudanteMobOut_Nome']) or empty($dadosPost['EstudanteMobOut_Curso']) or empty($dadosPost['EstudanteMobOut_Matricula'])
            or empty($dadosPost['EstudanteMobOut_Modalidade']) or empty($dadosPost['EstudanteMobOut_cpf']) or empty($dadosPost['EstudanteMobOut_identidade']) 
            or empty($dadosPost['EstudanteMobOut_celular'])  or empty($dadosPost['EstudanteMobOut_endereco']) or empty($dadosPost['EstudanteMobOut_nomeFamiliar']) 
            or empty($dadosPost['EstudanteMobOut_EmailFamiliar']) or empty($dadosPost['EstudanteMobOut_GrauParentesco']) or empty($dadosPost['EstudanteMobOut_DataSaida']) 
            or empty($dadosPost['EstudanteMobOut_Grau']) or empty($dadosPost['EstudanteMobOut_DataRetorno']) or empty($dadosPost['EstudanteMobOut_auxilioFinanceiro']) 
            or empty($dadosPost['EstudanteMobOut_FinalidadeIntercambio']) or empty($dadosPost['EstudanteMobOut_Campus']) or empty($dadosPost['EstudanteMobOut_TelefoneFamiliar']) or empty($dadosPost['EstudanteMobOut_email'])) // tem que preencher todos os campo 
            { 
            	throw new Exception("Preencha todos os campos");

				return false;
			}
              

            $FILE = $_FILES['EstudanteMobOut_CartaAceitacao'];
            $Path = 'assets\files/';

             $nome_arq = $_FILES['EstudanteMobOut_CartaAceitacao']['name'];
     
           

            $sql = $con->prepare('INSERT INTO EstudanteMobOut (EstudanteMobOut_InstituicaoDest,EstudanteMobOut_PaisDest,EstudanteMobOut_Programa,
            EstudanteMobOut_Campus,EstudanteMobOut_Grau,EstudanteMobOut_Nome,EstudanteMobOut_Curso,EstudanteMobOut_Matricula,EstudanteMobOut_Modalidade,EstudanteMobOut_cpf,
            EstudanteMobOut_identidade,EstudanteMobOut_email,EstudanteMobOut_celular,EstudanteMobOut_endereco,EstudanteMobOut_nomeFamiliar,EstudanteMobOut_TelefoneFamiliar,
            EstudanteMobOut_EmailFamiliar,EstudanteMobOut_GrauParentesco,EstudanteMobOut_DataSaida,EstudanteMobOut_DataRetorno,EstudanteMobOut_auxilioFinanceiro,
            EstudanteMobOut_TipoAuxilio,EstudanteMobOut_DescTipoAuxilio,EstudanteMobOut_FinalidadeIntercambio, EstudanteMobOut_CartaAceitacao) VALUES (:EstudanteMobOut_InstituicaoDest,:EstudanteMobOut_PaisDest,:EstudanteMobOut_Programa,
            :EstudanteMobOut_Campus,:EstudanteMobOut_Grau,:EstudanteMobOut_Nome,:EstudanteMobOut_Curso,:EstudanteMobOut_Matricula,:EstudanteMobOut_Modalidade,:EstudanteMobOut_cpf,
            :EstudanteMobOut_identidade,:EstudanteMobOut_email,:EstudanteMobOut_celular,:EstudanteMobOut_endereco,:EstudanteMobOut_nomeFamiliar,:EstudanteMobOut_TelefoneFamiliar,
            :EstudanteMobOut_EmailFamiliar,:EstudanteMobOut_GrauParentesco,:EstudanteMobOut_DataSaida,:EstudanteMobOut_DataRetorno,:EstudanteMobOut_auxilioFinanceiro,
            :EstudanteMobOut_TipoAuxilio,:EstudanteMobOut_DescTipoAuxilio,:EstudanteMobOut_FinalidadeIntercambio, :EstudanteMobOut_CartaAceitacao)'); 


            $sql->bindValue(':EstudanteMobOut_InstituicaoDest', $dadosPost['EstudanteMobOut_InstituicaoDest'], PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_PaisDest', $dadosPost['EstudanteMobOut_PaisDest'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_CartaAceitacao', $nome_arq,PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Programa', $dadosPost['EstudanteMobOut_Programa'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Campus', $dadosPost['EstudanteMobOut_Campus'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Grau', $dadosPost['EstudanteMobOut_Grau'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Nome', $dadosPost['EstudanteMobOut_Nome'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Curso', $dadosPost['EstudanteMobOut_Curso'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Matricula', $dadosPost['EstudanteMobOut_Matricula'],PDO::PARAM_INT);
            $sql->bindValue(':EstudanteMobOut_Modalidade', $dadosPost['EstudanteMobOut_Modalidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_cpf', $dadosPost['EstudanteMobOut_cpf'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_identidade', $dadosPost['EstudanteMobOut_identidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_email', $dadosPost['EstudanteMobOut_email'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_endereco', $dadosPost['EstudanteMobOut_endereco'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_celular', $dadosPost['EstudanteMobOut_celular'],PDO::PARAM_INT);
            $sql->bindValue(':EstudanteMobOut_nomeFamiliar', $dadosPost['EstudanteMobOut_nomeFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_TelefoneFamiliar', $dadosPost['EstudanteMobOut_TelefoneFamiliar'],PDO::PARAM_INT);
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
            else{
                $upload_file = $Path . $nome_arq;
                $file_size = $FILE['size'];
                
          
                if ($file_size > MAX_FILE_SIZE){
                  echo "Arquivo muito grande";
          
                  return false;
          
                }
          
                if (move_uploaded_file($FILE['tmp_name'], $upload_file)){
                    return true;
                }
            
            }
  
            return true;

	    }

        public static function updateMobOutStudent($params) // EDITAR UM ALUNO EM MOB OUT 
		{

            $con = Connection::getConn(); // ACABAR DE FAZER

			$sql = "UPDATE `EstudanteMobOut`  SET  EstudanteMobOut_InstituicaoDest = :EstudanteMobOut_InstituicaoDest, EstudanteMobOut_PaisDest = :EstudanteMobOut_PaisDest, EstudanteMobOut_Programa = :EstudanteMobOut_Programa,
            EstudanteMobOut_Campus = :EstudanteMobOut_Campus, EstudanteMobOut_Grau = :EstudanteMobOut_Grau, EstudanteMobOut_Nome = :EstudanteMobOut_Nome, EstudanteMobOut_Curso = :EstudanteMobOut_Curso, 
            EstudanteMobOut_Matricula = :EstudanteMobOut_Matricula, EstudanteMobOut_Modalidade = :EstudanteMobOut_Modalidade, EstudanteMobOut_cpf = :EstudanteMobOut_cpf, EstudanteMobOut_identidade = :EstudanteMobOut_identidade,
            EstudanteMobOut_email = :EstudanteMobOut_email, EstudanteMobOut_celular = :EstudanteMobOut_celular, EstudanteMobOut_endereco = :EstudanteMobOut_endereco, EstudanteMobOut_nomeFamiliar = :EstudanteMobOut_nomeFamiliar,
            EstudanteMobOut_TelefoneFamiliar = :EstudanteMobOut_TelefoneFamiliar, EstudanteMobOut_EmailFamiliar = :EstudanteMobOut_EmailFamiliar,EstudanteMobOut_GrauParentesco = :EstudanteMobOut_GrauParentesco,
            EstudanteMobOut_DataSaida = :EstudanteMobOut_DataSaida, EstudanteMobOut_DataRetorno = :EstudanteMobOut_DataRetorno, EstudanteMobOut_auxilioFinanceiro = :EstudanteMobOut_auxilioFinanceiro,
            EstudanteMobOut_TipoAuxilio = :EstudanteMobOut_TipoAuxilio, EstudanteMobOut_DescTipoAuxilio = :EstudanteMobOut_DescTipoAuxilio, EstudanteMobOut_FinalidadeIntercambio = :EstudanteMobOut_FinalidadeIntercambio, 
            EstudanteMobOut_CartaAceitacao = :EstudanteMobOut_CartaAceitacao WHERE idEstudante = :idEstudante";

             $sql = $con->prepare($sql);
            // $sql->execute(array(':EstudanteMobOut_InstituicaoDest', $params['EstudanteMobOut_InstituicaoDest'], PDO::PARAM_STR,
            //                     ':EstudanteMobOut_PaisDest', $params['EstudanteMobOut_PaisDest'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Programa', $params['EstudanteMobOut_Programa'], PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Campus', $params['EstudanteMobOut_Campus'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Grau', $params['EstudanteMobOut_Grau'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Nome', $params['EstudanteMobOut_Nome'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Curso', $params['EstudanteMobOut_Curso'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Matricula', $params['EstudanteMobOut_Matricula'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_Modalidade', $params['EstudanteMobOut_Modalidade'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_cpf', $params['EstudanteMobOut_cpf'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_identidade', $params['EstudanteMobOut_identidade'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_email', $params['EstudanteMobOut_email'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_celular', $params['EstudanteMobOut_celular'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_endereco', $params['EstudanteMobOut_endereco'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_nomeFamiliar', $params['EstudanteMobOut_nomeFamiliar'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_TelefoneFamiliar', $params['EstudanteMobOut_TelefoneFamiliar'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_EmailFamiliar', $params['EstudanteMobOut_EmailFamiliar'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_GrauParentesco', $params['EstudanteMobOut_GrauParentesco'] , PDO::PARAM_STR,
            //                     ':EstudanteMobOut_DataSaida', $params['EstudanteMobOut_DataSaida'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_DataRetorno', $params['EstudanteMobOut_DataRetorno'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_auxilioFinanceiro', $params['EstudanteMobOut_auxilioFinanceiro'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_TipoAuxilio', $params['EstudanteMobOut_TipoAuxilio'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_DescTipoAuxilio', $params['EstudanteMobOut_DescTipoAuxilio'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_FinalidadeIntercambio', $params['EstudanteMobOut_FinalidadeIntercambio'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_CartaAceitacao', $params['EstudanteMobOut_CartaAceitacao'],PDO::PARAM_STR,
            //                     ':EstudanteMobOut_GrauParentesco', $params['EstudanteMobOut_GrauParentesco'] , PDO::PARAM_STR,
            //                     ':idEstudante', $params['idEstudante'],PDO::PARAM_INT));



            $sql->bindValue(':EstudanteMobOut_InstituicaoDest', $params['EstudanteMobOut_InstituicaoDest'], PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_PaisDest', $params['EstudanteMobOut_PaisDest'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Programa', $params['EstudanteMobOut_Programa'], PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Campus', $params['EstudanteMobOut_Campus'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Grau', $params['EstudanteMobOut_Grau'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Nome', $params['EstudanteMobOut_Nome'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Curso', $params['EstudanteMobOut_Curso'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Matricula', $params['EstudanteMobOut_Matricula'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_Modalidade', $params['EstudanteMobOut_Modalidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_cpf', $params['EstudanteMobOut_cpf'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_identidade', $params['EstudanteMobOut_identidade'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_email', $params['EstudanteMobOut_email'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_celular', $params['EstudanteMobOut_celular'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_endereco', $params['EstudanteMobOut_endereco'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_nomeFamiliar', $params['EstudanteMobOut_nomeFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_TelefoneFamiliar', $params['EstudanteMobOut_TelefoneFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_EmailFamiliar', $params['EstudanteMobOut_EmailFamiliar'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_GrauParentesco', $params['EstudanteMobOut_GrauParentesco'] , PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_DataSaida', $params['EstudanteMobOut_DataSaida'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_DataRetorno', $params['EstudanteMobOut_DataRetorno'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_auxilioFinanceiro', $params['EstudanteMobOut_auxilioFinanceiro'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_TipoAuxilio', $params['EstudanteMobOut_TipoAuxilio'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_DescTipoAuxilio', $params['EstudanteMobOut_DescTipoAuxilio'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_FinalidadeIntercambio', $params['EstudanteMobOut_FinalidadeIntercambio'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_CartaAceitacao', $params['EstudanteMobOut_CartaAceitacao'],PDO::PARAM_STR);
            $sql->bindValue(':EstudanteMobOut_GrauParentesco', $params['EstudanteMobOut_GrauParentesco'] , PDO::PARAM_STR);
            $sql->bindValue(':idEstudante', $params['idEstudante'],PDO::PARAM_INT);
            
            

        $resultado =  $sql->execute();
        

        if ($resultado === 0) {
            throw new Exception("Falha ao alterar estudante");

            return false;
        }

        return true;



        }

        public static function deleteStudent($idEstudante) 
		{
			$con = Connection::getConn();

                
                    $sql2 = "DELETE FROM EstudanteMobOut WHERE idEstudante = :idEstudante";
                    $sql2 = $con->prepare($sql2);
                    $sql2->bindValue(':idEstudante',$idEstudante);
                    $resultado = $sql2->execute();
             

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar estudante");

				return false;
			}

			return true;
		}


}
