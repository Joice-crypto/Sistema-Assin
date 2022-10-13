
<?php



class FormsController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('FormsAcordoInter.html'); // vou carregar o formulario de acordo internacional

        $parametros = array();
    

       $conteudo =  $template->render($parametros);

       echo $conteudo;

    }
    public function FormMobilidadeInEst()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('FormsMobilidadeInEst.html'); // vou carregar o formulario de mobilidade in estudante

        $parametros = array();
    

       $conteudo =  $template->render($parametros);

       echo $conteudo;

    }
}
