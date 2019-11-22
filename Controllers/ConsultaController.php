<?php
require_once '.\Models\ConsultaModel.php';
require_once '.\Controllers\ArtistaController.php';
require_once '.\Controllers\CancionController.php';

class ConsultaController {
    private $model;
    private $session;
    private $artista;

    public function __construct() {
        $this->model = new ConsultaModel();
        $this->artista = new ArtistaController();
        $this->cancion = new CancionController();
        $this->session = new UserController();
    }

    public function getAllCanciones(){
        $this->checkLogin();
        $canciones = $this->getCanciones(null);
        $artistas = $this->getArtistas();
        $this->cancion->display($canciones, $artistas);
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
            return $this->cancion->getCanciones($artista);
        } elseif ($artista == null) {
            return $this->model->getAllCancionesConArtistas();
        }
    }

    public function getArtistas() {
        return $this->artista->get();
    }

    public function checkLogin() {
        return $this->session->checkLogin();
    }
}