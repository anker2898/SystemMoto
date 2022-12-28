<?php

class Login extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->mensaje = false;
    }

    public function render() {
        $this->view->render('login/index');
    }

    public function auth() {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $data = $this->model->authentication($username, $password);

        if ($data["LOGIN"]) {
            if ($data["RESET"]) {
                $this->view->render('login/reset');
            } else {
                $this->view->mensaje = "Bienvenido " . $_SESSION['user']['NOMBRES'];
                $this->view->render('main/index');
            }
        } else {
            $this->view->mensaje = true;
            $this->render();
        }
    }

    public function reset() {
        try {
            $password = $_POST['pass'];
            $username = $_SESSION['user']['USUARIO'];
            $this->model->resetPassword($username, $password);
            $this->view->render('main/index');
        } catch (Exception $ex) {
            $this->render();
        }
    }

    public function close() {
        session_destroy();
        $this->render();
    }

}
