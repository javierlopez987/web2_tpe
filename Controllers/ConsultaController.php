<?php
require_once '.\Models\ConsultaModel.php';

class ConsultaController {
    private $model;
    private $session;

    public function __construct() {
        $this->model = new ConsultaModel();
    }

    public function getCanciones($artista) {
        if($artista != "") {
            return $this->model->getCanciones($artista);
        } elseif ($artista == null) {
            return $this->model->getAllCancionesConArtistas();
        }
    }
}