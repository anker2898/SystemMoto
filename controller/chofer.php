<?php

class Chofer extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('chofer/index');
    }

}
