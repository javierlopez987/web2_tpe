<?php
require_once '.\Models\CancionModel.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\CancionView.php';

class CancionController {
    private $model;
    private $view;
    private $session;
    private $artista;

    public function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionView();
        $this->session = new UserHelper();
        $this->artista = new ArtistaModel();
    }

    public function getAllCanciones(){
        $this->checkLogin();
        $canciones = $this->getCanciones(null);
        $artistas = $this->artista->getArtistas();
        if($this->session->getUserType() == 1) {
            $this->view->display($canciones, $artistas);
        } else {
            $this->view->displayCancionesNoAdm($canciones, $artistas);
        }
    }

    public function getCanciones($artista) {
        if($artista != "") {
            return $this->model->getCanciones($artista);
        } elseif ($artista == null) {
            return $this->model->getAllCancionesConArtistas();
        }
    }

    public function getCancionPorId($id) {
        if($id != "") {
            return $this->cancion->getCanciones($id);
        } elseif ($id == null) {
            return $this->model->getAllCancionesConArtistas();
        }
    }

    public function displayCancion($id) {
        $cancion = $this->model->getCancionPorId($id);
        $this->view->showOne($cancion);
    }

    public function displayCancionCSR($id) {
        $this->checkLogIn();
        $cancion = $this->model->getCancionPorId($id);
        $user = $this->session->getUser();
        $this->view->displayCancionCSR($cancion, $user);

    }

    public function getVisitante() {
        $query = $this->model->get();
        $this->view->displayVisitante($query);
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