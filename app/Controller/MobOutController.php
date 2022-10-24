
<?php



class MobOutController
{
    public function index()
    {

        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MobOut.html'); // apenas vai carregar a pagina inicial
            $parametros = array();
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function getAllMobOutStudents()
    {

        try {
            $loader = new \Twig\Loader\FilesystemLoader('app/View/');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('MOEstudante.html'); // apenas vai carregar a pagina inicial
            $colecMobEst = MobOutEstudante::getAllMobilidades();
            $parametros = array();
            $parametros['MobOutEstudante'] = $colecMobEst;
            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    // TERMINAR OS OUTROS METODOS AMANHA 
   
}
