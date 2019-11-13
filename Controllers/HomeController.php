<?php
require_once(".\Views\HomeView.php");

class HomeController extends Controller 
{
    public function __construct()
    {
        $this->view = new HomeView();
    }

    function index()
    {
        $this->view->showIndex();
    }

    public function getMenu() {
        $this->view->displayMenu();
    }

    public function checkLogIn() {
        $this->view->showIndex(); 
    }   
}