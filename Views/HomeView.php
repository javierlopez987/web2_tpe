<?php
require_once("View.php");

class HomeView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function showGuest() {
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/menuGuest.tpl');
    }

}