<?php
require_once("Router.php");
require_once("./api/apiControllers/CommentApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comments/:ID", "GET", "CommentApiController", "getCommentsbyCancion");
$router->addRoute("comments/:ID", "DELETE", "CommentApiController", "deleteComment");
$router->addRoute("comments", "POST", "CommentApiController", "addComment");
$router->addRoute("comments/:ID", "PUT", "CommentApiController", "updateComment");


// rutea
$router->route($resource, $method);