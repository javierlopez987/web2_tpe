<?php
require_once("Models/UserModel.php");
require_once("Views/UserView.php");
require_once("Session.php");

class UserController {
    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function login() {
        if(isset($_POST['user']) && isset($_POST['opass'])) {
            if($_POST['user'] != null) {
                $user = $this->model->getByUser($_POST['user']);
                if ($user != null && password_verify($_POST['opass'], $user->password)){
                    Session::getInstance();
                    $_SESSION['user'] = $user->user;
                    $_SESSION['userId'] = $user->id;
                    $this->view->showAdmin();
                }else{
                    $this->view->registerView();
                }
            } else {
                $this->view->loginView();
            }
        } else {
            $this->view->loginView();
        }

    }

    public function logout() {
        Session::getInstance();
        session_destroy();
        header("Location: " . BASE);
    }
    
    public function registracion() {
        if(isset($_POST['user']) && $_POST['opass'] == $_POST['rpass']) {
            if(($_POST['user'])!= null && $_POST['opass'] != "" && ($_POST['opass'] == $_POST['rpass'])) {
                $user = $this->model->getByUser($_POST['user']);
                if (!$user) {
                    $pass = password_hash($_POST['opass'], PASSWORD_DEFAULT);
                    $this->model->create(array($_POST['user'], $pass));
                    $user = $this->model->getByUser($_POST['user']);
                    Session::getInstance();
                    $_SESSION['user'] = $user->user;
                    $_SESSION['userId'] = $user->id;
                    $this->view->showAdmin();
                } else {
                    header("Location: " . BASE_LOGIN);
                }
            } else {
                header("Location: " . BASE_REGISTRACION);
            }
        } else {
            $this->view->registerView();
        }
    }

    public function checkLogIn() {
        Session::getInstance();

        if(!isset($_SESSION['userId'])){
            header("Location: " . BASE);
            die();
        } elseif (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 20000)) { 
            $this->logout();
            die();
        } 
        
        $_SESSION['LAST_ACTIVITY'] = time();
        $usuario = $_SESSION['user'];
        return $usuario;
    }
}