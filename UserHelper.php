<?php
require_once 'Session.php';

class UserHelper {

    public function __construct() {

    }

    public function login($user) {
        Session::getInstance();
        $_SESSION['userId'] = $user->id;
        $_SESSION['user'] = $user->user;
    }

    public function logout() {
        Session::getInstance();
        session_destroy();
    }

    public function checkLogin() {
        Session::getInstance();
        if (!isset($_SESSION['userId'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            Session::getInstance();
        }
        return $_SESSION['user'];
    }
}