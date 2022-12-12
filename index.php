<?php

require_once 'Core/core.php';
require_once './panel/app/Controller/MobOutController.php';
require_once './panel/app/Controller/ErrorController.php';
require_once './panel/app/Controller/AcordosController.php';
require_once './panel/app/Controller/HomeController.php';
require_once 'app/Controller/LoginController.php';
require_once './panel/app/Model/AcordosInternacionais.php';
require_once './panel/app/Model/MobOutEstudante.php';
require_once 'vendor/autoload.php';
require_once 'lib/Database/Connection.php';



$loader = new \Twig\Loader\FilesystemLoader('panel/app/View');// carrega minhas views do adiministrador
$loader2 = new \Twig\Loader\FilesystemLoader('panel/app/View');// carrega minhas views do geral

$twig = new \Twig\Environment($loader); // carrega o ambiente 

$template = file_get_contents('panel/app/View/Estrutura.html');
$template2 = file_get_contents('panel/app/View/footer.html');
$template3 = file_get_contents('app/View/Login.html');


        ob_start();
        $core = new Core;
        $core->start($_GET);

        $saida = ob_get_contents();
        ob_end_clean();

        $tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
        echo $tplPronto;
        $tplPronto2 = str_replace('{{footer}}', $saida, $template2);
        echo $tplPronto2;


       $tplPronto3 = str_replace('{{geral}}', $saida, $template3);
        echo $tplPronto3;


?>
