<?php
require_once("View.php");

class ArtistaView extends View{
    public function __construct() {
        parent::__construct();
    }

    public function showIndex($artistas){
        $this->smarty->assign('titulo',"Artistas");
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/artistasAdm.tpl');
    }
    
    public function showOne($artista){
        $this->smarty->assign('titulo',"Artista");
        $this->smarty->assign('artista',$artista);
        $this->smarty->display('templates/artistaAdm.tpl');
    }
    
    public function displayUpdate($artista) {
        $this->smarty->assign('titulo',"Artista a modificar");
        $this->smarty->assign('artista',$artista);
        $this->smarty->assign('BASE',BASE_ARTISTA);
        $this->smarty->display('templates/artistaAdmUpdate.tpl');
    }

    public function displayVisitante($artistas){
        $this->smarty->assign('titulo',"Artistas");
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/artistas.tpl');
    }

    public function displayInsertImg($id) {
        $this->smarty->assign('titulo',"Insertar Imagen");
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/artistaAdmInsertImg.tpl');
    }
}
