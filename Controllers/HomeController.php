<?php
require_once(".\Views\HomeView.php");

class HomeController {
    private $view;
    private $session;

    public function __construct() {
        $this->view = new HomeView();
        $this->session = new UserHelper();
    }

    public function displayAdmin() {
        $this->checkLogin();
        $this->view->showAdmin();
    }

    public function displayGuest() {
        $this->view->showGuest();
    }

    public function checkLogin() {
        $this->session->checkLogin();
    }
}