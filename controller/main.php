<?php

class Main extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    public function render() {
        $this->view->mensaje = "Bienvenido ".$_SESSION['user']['NOMBRES'];
        $this->view->render('main/index');
    }

}
