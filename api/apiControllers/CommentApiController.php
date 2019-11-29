<?php
require_once("./Models/CommentModel.php");
require_once("./api/apiControllers/ApiController.php");
require_once("./api/apiViews/JSONView.php");

class CommentApiController extends ApiController{
  
    /**
     * Obtiene los comentarios dado un ID de Cancion
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */

    public function getCommentsbyCancion($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        
        $comment = $this->model->getCommentsbyCancion($id);
        
        if ($comment) {
            $this->view->response($comment, 200);   
        } else {
            $this->view->response(null, 404);
        }
    }

    // CommentApiController.php
    public function deleteComment($params = []) {
        $comment_id = $params[':ID'];
        $comment = $this->model->getComment($comment_id);

        if ($comment) {
            $this->model->deleteComment($comment_id);
            $this->view->response("Comentario id=$comment_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$comment_id not found", 404);
    }

    // CommentApiController.php
   public function addComment($params = []) {     
        $comment = $this->getData(); // la obtengo del body
        // inserta la tarea
        $commentId = $this->model->create(array($comment->mensaje, $comment->valoracion, $comment->cancion, $comment->user));
        // obtengo la recien creada
        $commentNuevo = $this->model->getCommentsbyCancion($commentId);
        
        if ($commentNuevo)
            $this->view->response($commentNuevo, 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }
}