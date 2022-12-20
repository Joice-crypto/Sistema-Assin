<?php 

class LoginController
	{
		public function index()
		{
			
			
			try {
				
			
				$loader = new \Twig\Loader\FilesystemLoader('app/view');
				$twig = new \Twig\Environment($loader, [
					'cache' => '/path/to/compilation_cache',
					'auto_reload' => true,
				]);
				$template = $twig->load('Login.html');
				$parameters['error'] = $_SESSION['msg_error'] ?? null;
				$conteudo = $template->render($parameters);
				echo $conteudo;
				
				
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}		
			
		
	}
	public function check()
		{
				try {
					$user = new User;
					$user->setEmailUser($_POST['emailUsers']);
					$user->setPasswordUser($_POST['senhaUsers']);
					$user->validateLogin();
					 header('Location: http://localhost:8000/?pagina=Home');
				} catch (\Exception $e) {
					$_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);
	
					header('Location:http://localhost:8000/Login');
					echo "deuerro";
				}
				
	}
}