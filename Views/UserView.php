<?php
require_once("View.php");

class UserView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function loginView(){
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/userLogin.tpl');
    }
    public function registerView(){
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/userRegister.tpl');
    }

}