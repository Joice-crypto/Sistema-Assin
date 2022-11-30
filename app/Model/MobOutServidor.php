<?php

require_once("app\Model\File.php");

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
}