<?php
require_once 'Controllers\CancionController.php';
require_once 'Controllers\ArtistaController.php';
require_once 'Controllers\HomeController.php';
require_once 'Controllers\UserController.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("BASE_CANCION", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/cancion');
define("BASE_ARTISTA", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/artistas');
define("BASE_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/user/login');
define("BASE_ADMINISTRADOR", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/administrador');

if($action == ''){
    $inivitadoController = new HomeController();
    $inivitadoController->getMenu();
}else{
    $partesURL = explode("/", $action);
    if($partesURL[0] == "cancion") {
        $cancionController = new CancionController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "create") {
                $cancionController->create();
            } elseif($partesURL[1] == "delete") {
                $cancionController->delete();
            } elseif($partesURL[1] == "update") {
                $cancionController->update();
            } elseif($partesURL[1] == "findId") {
                $cancionController->findById($partesURL[1]);
            } elseif($partesURL[1] == "findColumn") {
                $cancionController->findByColumn($partesURL[3],$partesURL[1]);
            }
        } else {
            $cancionController->get();
        }
    } elseif ($partesURL[0] == "artistas") {
        $artistaController = new ArtistaController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "create") {
                $artistaController->create();
            } elseif($partesURL[1] == "delete") {
                $artistaController->delete();
            } elseif($partesURL[1] == "edit") {
                $artistaController->update();
            } elseif($partesURL[1] == "imagen") {
                $artistaController->insertImg();
            }
        } else {
            $artistaController->index();
        }
    } elseif ($partesURL[0] == "user") {
        $userController = new UserController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "register") {
                $userController->registracion();
            } elseif($partesURL[1] == "login") {
                $userController->login();
            } elseif($partesURL[1] == "logout") {
                $userController->logout();
            }
        } else {
            $userController->goHome();
        }
    } elseif ($partesURL[0] == "administrador") {
        $homeController = new HomeController();
        $homeController->index();
    } elseif ($partesURL[0] == "visitante") {
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "cancion") {
                $cancionController = new CancionController();
                $cancionController->getVisitante();
            } elseif($partesURL[1] == "artistas") {
                $artistaController = new ArtistaController();
                $artistaController->getVisitante();
            } 
        } else {
            $inivitadoController = new HomeController();
            $inivitadoController->getMenu();
        }
    }
}