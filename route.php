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
define("BASE_REGISTRACION", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/user/register');
define("BASE_ADMINISTRADOR", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/administrador');
define("BASE_ADMIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/user/admin/get');

if($action == ''){
    $inivitadoController = new HomeController();
    $inivitadoController->displayGuest();
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
            } elseif($partesURL[1] == "get") {
                $cancionController->displayCancion($partesURL[2]);
            } elseif($partesURL[1] == "get-csr") {
                $cancionController->displayCancionCSR($partesURL[2]);
            }
        } else {
            $cancionController->getAllCanciones();
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
                if((count($partesURL) > 2) && $partesURL[2] == "blank") {
                    $artistaController->setBlankImg();
                } else {
                    $artistaController->insertImg();
                }
            } elseif($partesURL[1] == "get") {
                $artistaController->displayArtista($partesURL[2]);
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
            } elseif($partesURL[1] == "admin") {
                if((count($partesURL) > 2) && ($partesURL[2] == "get")) {
                    $userController->getUsers();
                } elseif ((count($partesURL) > 2) && $partesURL[2] == "set") {
                    $userController->setUsers();
                } elseif ((count($partesURL) > 2) && $partesURL[2] == "delete"){
                    $userController->deleteUser($partesURL[3]);
                }
            }
        } else {
            $userController->goHome();
        }
    } elseif ($partesURL[0] == "administrador") {
        $homeController = new HomeController();
        $homeController->displayAdmin();
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
            $inivitadoController->displayGuest();
        }
    }
}