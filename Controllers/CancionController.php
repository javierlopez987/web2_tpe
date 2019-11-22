<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Views\CancionView.php';
require_once 'ConsultaController.php';

class CancionController extends Controller{
    private $consulta;

    public function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionView();
        $this->session = new UserController();
        $this->consulta = new ConsultaController();
    }

    public function get(){
        $this->checkLogin();
        $canciones = $this->model->get();
        $this->view->display($canciones);
    }

    public function getAllCanciones(){
        $this->checkLogin();
        $canciones = $this->consulta->getCanciones(null);
        //var_dump($canciones);die();
        $this->view->display($canciones);
    }

    public function create() {
        $this->checkLogin();
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->create(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']));
        }
        header("Location: " . BASE_CANCION);
    }

    public function delete() {
        $this->checkLogin();
        if(isset($_POST) && isset($_POST['id'])) {
            $this->model->delete($_POST['id']);
        }
        header("Location: " . BASE_CANCION);
    }

    public function update() {
        $this->checkLogin();
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_CANCION);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            $cancion = $this->findById($_POST['id']);
            $this->view->displayUpdate($cancion);
        }
    }

    private function findById($id) {
        $this->checkLogin();
        return $this->model->getByID($id);
    }

    public function findByColumn($column,$parameter) {
        $this->checkLogin();
        $obj = $this->model->findByColumn($column,$parameter);
    }

    public function checkLogin() {
        return $this->session->checkLogin();
    }
}