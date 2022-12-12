<?php

require_once("panel\app\Model\File.php");

class MobOutServidor
{

    public static function getAllMobilidades(){ // PEGAR TODas as nmobilidades

        $con = Connection::getConn();
         
         $sql = "SELECT * from `ServidorMobOut`";
         $sql = $con->prepare($sql);
         $sql->execute();
 
         $resultado = array();
 
         while ($row = $sql->fetchObject('MobOutServidor')) {
             $resultado[] = $row;
         
         }
 
         if (!$resultado) {
             throw new Exception("Não foi encontrado nenhum registro no banco de dados");		
         }
 
         return $resultado;
       

    }
    public static function GetMobilidadeById($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * from `ServidorMobOut` WHERE idServidor = :idServidor";
        $sql = $con->prepare($sql);
		$sql->bindValue(':idServidor', $idPost, PDO::PARAM_INT);
		$sql->execute();

        $resultado = $sql->fetchObject('MobOutServidor');

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco");	
			} else {
				$resultado;
			}

			return $resultado;

    }

    public static function insertServidor($dadosPost) // INSERIR mobilidade out estudante
    {

        $con = Connection::getConn();
 
      
        if (empty($dadosPost['Servidor_InstituicaoDest']) or empty($dadosPost['Servidor_PaisDest']) or empty($dadosPost['Servidor_Cargo']) 
        or empty($dadosPost['Servidor_Campus']) or empty($dadosPost['Servidor_Nome']) or empty($dadosPost['Servidor_Matricula'])
        or empty($dadosPost['Servidor_Periodo']) or empty($dadosPost['Servidor_cpf']) or empty($dadosPost['Servidor_identidade']) 
        or empty($dadosPost['Servidor_email'])  or empty($dadosPost['Servidor_celular']) or empty($dadosPost['Servidor_endereco']) 
        or empty($dadosPost['Servidor_DataSaida']) or empty($dadosPost['Servidor_DataRetorno']) or empty($dadosPost['Servidor_EnderExterior']) 
        or empty($dadosPost['Servidor_MotivoMob'])) // tem que preencher todos os campo 
        { 
            throw new Exception(" Preencha todos os campos");

            return false;
        }
        

        $sql = $con->prepare('INSERT INTO ServidorMobOut (Servidor_InstituicaoDest,Servidor_PaisDest,Servidor_Cargo,Servidor_Campus,Servidor_Nome,Servidor_Matricula,
        Servidor_Periodo,Servidor_cpf,Servidor_identidade,Servidor_email,Servidor_celular,Servidor_endereco,Servidor_DataSaida,Servidor_DataRetorno,
        Servidor_EnderExterior,Servidor_MotivoMob) VALUES (:Servidor_InstituicaoDest,:Servidor_PaisDest,:Servidor_Cargo,:Servidor_Campus,:Servidor_Nome,:Servidor_Matricula,
        :Servidor_Periodo,:Servidor_cpf,:Servidor_identidade,:Servidor_email,:Servidor_celular,:Servidor_endereco,:Servidor_DataSaida,:Servidor_DataRetorno,
        :Servidor_EnderExterior,:Servidor_MotivoMob)'); 

          
			$sql->bindValue(':Servidor_InstituicaoDest', $dadosPost['Servidor_InstituicaoDest'], PDO::PARAM_STR);
            $sql->bindValue(':Servidor_PaisDest', $dadosPost['Servidor_PaisDest'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_Cargo', $dadosPost['Servidor_Cargo'], PDO::PARAM_STR);
            $sql->bindValue(':Servidor_Campus', $dadosPost['Servidor_Campus'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_Nome', $dadosPost['Servidor_Nome'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_Matricula', $dadosPost['Servidor_Matricula'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_Periodo', $dadosPost['Servidor_Periodo'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_cpf', $dadosPost['Servidor_cpf'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_identidade', $dadosPost['Servidor_identidade'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_email', $dadosPost['Servidor_email'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_celular', $dadosPost['Servidor_celular'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_endereco', $dadosPost['Servidor_endereco'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_DataSaida', $dadosPost['Servidor_DataSaida'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_DataRetorno', $dadosPost['Servidor_DataRetorno'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_EnderExterior', $dadosPost['Servidor_EnderExterior'],PDO::PARAM_STR);
            $sql->bindValue(':Servidor_MotivoMob', $dadosPost['Servidor_MotivoMob'],PDO::PARAM_STR);
            
            if ($sql->execute()) {
                $ID = $con->lastInsertId();
                if ($dadosPost['Servidor_Cargo'] == 'Tecnico'){
                    $SetorTecnico = $dadosPost['SetorTecnico'];
                    $CampusTecnico = $dadosPost['CampusTecnico'];
                    $InteressesTecnico = $dadosPost['InteressesTecnico'];
                    $AreaTecnico = $dadosPost['AreaTecnico'];

                    $sql2 = $con->prepare('INSERT INTO tecnico (SetorTecnico,CampusTecnico,InteressesTecnico,AreaTecnico,idTecnico) VALUES (?,?,?,?,?');

                    $sql->bindValue(1, $SetorTecnico, PDO::PARAM_STR);
                    $sql->bindValue(2, $CampusTecnico,PDO::PARAM_STR);
                    $sql->bindValue(3, $InteressesTecnico, PDO::PARAM_STR);
                    $sql->bindValue(4, $AreaTecnico,PDO::PARAM_STR);
                    $sql->bindValue(5, $ID,PDO::PARAM_STR);
              }
              else if($dadosPost['Servidor_Cargo'] == 'Professor'){
                $CursoProfessor = $dadosPost['CursoProfessor'];
                $CampusProfessor = $dadosPost['CampusProfessor'];
                $InteressesProfessor = $dadosPost['InteressesProfessor'];
                $TitulacaoProfessor = $dadosPost['TitulacaoProfessor'];

                $sql2 = $con->prepare('INSERT INTO professor (CursoProfessor,CampusProfessor,InteressesProfessor,TitulacaoProfessor,idProfessor) VALUES (?,?,?,?,?');

                $sql->bindValue(1, $CursoProfessor, PDO::PARAM_STR);
                $sql->bindValue(2, $CampusProfessor,PDO::PARAM_STR);
                $sql->bindValue(3, $InteressesProfessor, PDO::PARAM_STR);
                $sql->bindValue(4, $TitulacaoProfessor,PDO::PARAM_STR);
                $sql->bindValue(5, $ID,PDO::PARAM_STR);


              }

                
            }

        $res =  $sql2->execute();

        if ($res === 0) {
            throw new Exception("Falha ao cadastrar Servidor");

            return false;
        }

        return true;

    }

}