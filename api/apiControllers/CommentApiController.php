<?php
require_once("./Models/CommentModel.php");
require_once("./api/apiControllers/ApiController.php");
require_once("./api/apiViews/JSONView.php");

class CommentApiController extends ApiController{
  
    public function getComments($params = null) {
        $comments = $this->model->get();
        $this->view->response($comments, 200);
    }

    /**
     * Obtiene un comentario dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    /*
    public function getComment($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $comment = $this->model->getByID($id);
        
        if ($comment) {
            $this->view->response($comment, 200);   
        } else {
            $this->view->response("No existe el comentario con el id={$id}", 404);
        }
    }
    */

    public function getCommentsbyCancion($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $comment = $this->model->getCommentsbyCancion($id);
        
        if ($comment) {
            $this->view->response($comment, 200);   
        } else {
            $this->view->response("No existe la cancion con el id={$id}", 404);
        }
    }

    // CommentApiController.php
    /*
    public function deleteComment($params = []) {
        $comment_id = $params[':ID'];
        $comment = $this->model->GetComment($comment_id);

        if ($comment) {
            $this->model->deleteComment($comment_id);
            $this->view->response("Comentario id=$comment_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$comment_id not found", 404);
    }
    */

    // CommentApiController.php
    /*
   public function addTask($params = []) {     
        $tarea = $this->getData(); // la obtengo del body

        // inserta la tarea
        $tareaId = $this->model->InsertarTarea($tarea->titulo, $tarea->descripcion,$tarea->prioridad, 0);

        // obtengo la recien creada
        $tareaNueva = $this->model->GetTarea($tareaId);
        
        if ($tareaNueva)
            $this->view->response($tareaNueva, 200);
        else
            $this->view->response("Error al insertar tarea", 500);

    }
    */

    // CommentApiController.php
    /*
    public function updateTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->GetTarea($task_id);

        if ($task) {
            $body = $this->getData();
            $titulo = $body->titulo;
            $descripcion = $body->descripcion;
            $prioridad = $body->prioridad;
            $tarea = $this->model->ActualizarTarea($task_id, $titulo, $descripcion, $prioridad);
            $this->view->response("Comentario id=$task_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
    }
    */

}