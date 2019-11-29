<?php
require_once("View.php");

class UserView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function loginView(){
        $this->smarty->assign('titulo',"Bienvenido");
        $this->smarty->display('templates/userLogin.tpl');
    }

    public function registerView(){
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/userRegister.tpl');
    }

    public function displayUsers($users) {
        $this->smarty->assign('titulo',"Administración de usuarios");
        $this->smarty->assign('users', $users);
        $this->smarty->assign('administrador', array(
            1 => 'Sí',
            0 => 'No')
          );
        $this->smarty->display('templates/userAdmin.tpl');
    }
}