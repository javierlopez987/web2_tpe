<?php
require_once("Session.php");

abstract class Controller 
{
    protected $model;
    protected $view;
    protected $session;

    public abstract function checkLogin();

    public function get(){
        $this->checkLogin();
        $query = $this->model->get();
        $this->view->display($query);
    }

    public function getVisitante() {
        $query = $this->model->get();
        $this->view->displayVisitante($query);
    }
}