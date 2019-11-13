<?php
require_once 'Controller.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\ArtistaView.php';

class ArtistaController extends Controller {

    function __construct() {
        $this->model = new ArtistaModel();
        $this->view= new ArtistaView();
        $this->session = new UserController();
    }

    public function index()
    {
        $this->checkLogIn();
        $artistas = $this->model->get();

        $this->view->showIndex($artistas);
    }

    public function show($id)
    {
        $this->checkLogIn();
        $artista = $this->model->findById($id);

        $this->view->showOne($artista);
    }

    public function create() {
        $this->checkLogIn();
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fechanac']) && isset($_POST['ranking'])) {
            $this->model->create(array($_POST['nombre'], $_POST['apellido'], $_POST['fechanac'], $_POST['ranking']));
        }
        header("Location: " . BASE_ARTISTA);
    }

    public function delete() {
        $this->checkLogIn();
        $this->model->delete($id);
        header("Location: " . BASE_ARTISTA);
    }

    public function update() {
        $this->checkLogIn();
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fechanac']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['apellido'], $_POST['fechanac'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_ARTISTA);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            $artista = $this->findById($_POST['id']);
            $this->view->displayUpdate($artista);
        }
    }

    private function findById($id) {
        $this->checkLogIn();
        return $this->model->getByID($id);
    }

    public function checkLogIn() {
        $this->session->checkLogIn();
    }

    public function insertImg() {
        if (isset ($_GET) && isset($_GET['id'])) {
            $this->view->displayInsertImg($_GET['id']);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            if($_FILES['img_insert']['type'] == "image/jpg" || $_FILES['img_insert']['type'] == "image/jpeg" || $_FILES['img_insert']['type'] == "image/png") {
                $img_path = $this->uploadImage(array($_FILES, pathinfo($_FILES['img_insert']['name'], PATHINFO_EXTENSION)));
                var_dump($img_path);die();
                $this->model->uploadImage(array($img_path));
            }
            else {
                $this->view->artistaAdmInsertImg($_POST['id']);
            }
        }
    }

    private function uploadImage($image){
        $target = 'img/artista/' . uniqid() . '.' . $image[1];
        move_uploaded_file($image[0]['img_insert']['tmp_name'], $target);
        return $target;
    }

}
