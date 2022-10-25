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
    public static function GetMobilidade($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * from `EstudanteMobOut` WHERE idEstudante = :idEstudante";
        $sql = $con->prepare($sql);
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
}
