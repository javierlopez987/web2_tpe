<?php
require_once("View.php");

class CancionView extends View {
    function __construct(){
        parent::__construct();
    }

    public function display($canciones, $artistas){
        $this->smarty->assign('titulo',"Canciones");
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->assign('puntajes', array(1,2,3,4,5,6,7,8,9,10));
        $this->smarty->display('templates/cancionesAdm.tpl');
    }

    public function displayCancionesNoAdm($canciones, $artistas){
        $this->smarty->assign('titulo',"Canciones");
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/cancionesNoAdm.tpl');
    }

    public function displayUpdate($cancion){
        $this->smarty->assign('titulo',"Canción a modificar");
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->assign('BASE',BASE);
        $this->smarty->display('templates/cancionAdmUpdate.tpl');
    }

    public function displayVisitante($canciones){
        $this->smarty->assign('titulo',"Canciones");
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->display('templates/canciones.tpl');
    }

    public function showOne($cancion){
        $this->smarty->assign('titulo',"Canción");
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display('templates/cancion.tpl');
    }

    public function displayCancionCSR($cancion, $user){
        $this->smarty->assign('titulo',"Canción");
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->assign('user', $user['userId']);
        $this->smarty->display('templates/cancionCSR.tpl');
    }
}