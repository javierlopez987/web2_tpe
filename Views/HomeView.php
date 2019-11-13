<?php
require_once("View.php");

class HomeView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function showIndex(){
        $this->smarty->assign('titulo',"Bienvenido Administador");
        $this->smarty->display('templates/home.tpl');
    }

    public function displayMenu() {
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/menu.tpl');
    }

}