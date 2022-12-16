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

                if ($result['pass'] === $this->password) {
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
                    );

                    return true;
                }
            }

            throw new \Exception('Login Inválido');
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