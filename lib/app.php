<?php

class App {

    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url);
        $url = explode('/', $url);
        session_start();
        $page = $_SESSION['login'] ? 'main' : 'login';

        if (empty($url[0])) {
            $path = 'controller/' . $page . '.php';
            require_once $path;
            $controller = new $page;
            $controller->loadModel('login');
            $controller->render();
            return false;
        }

        $url[0] = $_SESSION['login'] ? $url[0] : 'login';
        $path = 'controller/' . $url[0] . '.php';

        if (file_exists($path)) {
            require_once $path;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->render();
            }
        } else {
            require_once 'controller/error.php';
            $controller = new ErrorResource();
        }
    }

}

?>