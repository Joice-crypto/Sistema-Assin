<?php

require_once 'app/Core/core.php';
require_once 'app/Controller/MobOutController.php';
require_once 'app/Controller/AdminMobOutController.php';
require_once 'app/Controller/ErrorController.php';
require_once 'app/Controller/AcordosController.php';
require_once 'app/Controller/AdminAcordosController.php';
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/LoginController.php'; 
require_once 'app/Model/AcordosInternacionais.php';
require_once 'app/Model/MobOutEstudante.php';
require_once 'app/Controller/LoginController.php';
require_once 'app/Model/User.php';
require_once 'app/View/Login.html';
require_once 'vendor/autoload.php';
require_once 'lib/Database/Connection.php';




$core = new Core;
echo $core->start($_GET);