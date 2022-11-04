<?php

require_once './app/Core/core.php';
require_once './app/Controller/MobOutController.php';
require_once './app/Controller/ErrorController.php';
require_once './app/Controller/AcordosController.php';
require_once './app/Controller/HomeController.php';
require_once './app/Model/AcordosInternacionais.php';
require_once './app/Model/MobOutEstudante.php';
require_once './vendor/autoload.php';
require_once './lib/Database/Connection.php';



$loader = new \Twig\Loader\FilesystemLoader('app/View');// carrega minhas views

$twig = new \Twig\Environment($loader); // carrega o ambiente 

$template = file_get_contents('app\View\Estrutura.html');
$template2 = file_get_contents('app\View\footer.html');


        ob_start();
        $core = new Core;
        $core->start($_GET);

        $saida = ob_get_contents();
        ob_end_clean();

        $tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
        echo $tplPronto;
        $tplPronto2 = str_replace('{{footer}}', $saida, $template2);
        echo $tplPronto2;

?>

