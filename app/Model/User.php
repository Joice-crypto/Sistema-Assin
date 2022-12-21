<?php


class User {

    private $idUser;
    private $nameUser;
    private $emailUser;
    private $passwordUser;

    public function validateLogin()
        {
            $conn = Connection::getConn();
            //selecionar o usuario que tenha o mesmo email do informado
            $sql = 'SELECT * FROM users WHERE emailUsers = :email';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->emailUser);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                if ($result['senhaUsers'] === $this->passwordUser) {
                    $_SESSION['usr'] = array(
                        'IdUsers' => $result['id'], 
                        'emailUsers' => $result['email']
                    );

                    return true;
                }
            }

            throw new \Exception('Login Inválido');
        }

        

        public static function insert($dadosPost){

            if (empty($dadosPost['nomeUsers']) or empty($dadosPost['emailUsers']) or empty($dadosPost['senhaUsers'])){
                { 
                    throw new Exception("Preencha todos os campos");
    
                    return false;
                }

            }
            $con = Connection::getConn();
            $sql = $con->prepare('INSERT INTO users (nomeUsers,emailUsers,senhaUsers)values(:nomeUsers,:emailUsers,:senhaUsers)');
            $sql->bindValue(':nomeUsers', $dadosPost['nomeUsers'], PDO::PARAM_STR);
            $sql->bindValue(':emailUsers', $dadosPost['emailUsers'], PDO::PARAM_STR);
            $sql->bindValue(':senhaUsers', md5($dadosPost['senhaUsers']), PDO::PARAM_STR);
            $res = $sql->execute();
            if ($res == 0) {
				throw new Exception("Falha ao inserir usuario");

				return false;
			}

			return true;
        }
        public function setEmailUser($emailUser)
        {
            $this->emailUser = $emailUser;
        }

        public function setNameUser($nameUser)
        {
            $this->nameUser = $nameUser;
        }

        public function setPasswordUser($passwordUser)
        {
            $this->passwordUser = $passwordUser;
        }

        public function getName()
        {
            return $this->nameUser;
        }

        public function getEmail()
        {
            return $this->emailUser;
        }

        public function getPassword()
        {
            return $this->passwordUser;
        }



}