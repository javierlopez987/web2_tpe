<?php
require_once(".\Views\HomeView.php");

class HomeController {
    private $view;
    private $session;

    public function __construct() {
        $this->view = new HomeView();
        $this->session = new UserController();
    }

    public function index() {
        $this->checkLogin();
        $this->view->showIndex();
    }

    public function getMenu() {
        $this->view->displayMenu();
    }

    public function checkLogin() {
        $this->session->checkLogin();
    }
}