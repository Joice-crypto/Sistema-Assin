
<?php



class FormsController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('FormsMobilidadeOutProf.html');

        $parametros = array();
        $parametros['nome'] = 'Joice';

       $conteudo =  $template->render($parametros);

       echo $conteudo;

    //     Postagem::selecionaTodos();
    }
}
