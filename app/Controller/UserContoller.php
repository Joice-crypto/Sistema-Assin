<?php 

class UserController {

    private $IdUsers;
    private $nomeUsers;
    private $emailUsers;
    private $senhaUsers;

    public function index (){ //usuarios do sistema

			try {

				$loader = new \Twig\Loader\FilesystemLoader('app/View/');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('User.html'); // ainda vou criar
				$parametros = array();
				$conteudo = $template->render($parametros);
				echo $conteudo;
				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}		
			

    }

    public function edit (){ // editar um usuario
        try {

            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('EditUser.html'); 
            $parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }		

    }
    public function create (){
        $loader = new \Twig\Loader\FilesystemLoader('app/View/');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('InsertUser.html'); // vai carregar a pagina de acordos da view

        $parametros = array();


        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    public function insertUser(){ //inserir um usuario
        try{
            User::insert($_POST);
            echo json_encode(array('status' => 'success', 'message' => "Acordo cadastrado com sucesso!"));
            echo '<script>location.href="/?pagina=Acordos&metodo=index"</script>';
        }
        catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="/?pagina=AdminAcordos&metodo=create"</script>';
        }
    }




}