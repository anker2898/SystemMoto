<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->rows = [];
    }

    public function render() {
        $this->view->rows = $this->model->get();
        $this->view->render('user/index');
    }
    
    public function new() {
        $this->view->render('user/form');
    }
    
    public function edit() {
        $this->view->render('user/form');
    }
    
    public function delete() {
        $this->view->dni = $_GET['id'];
        $this->view->render('user/delete');
    }
    
    public function deleteUser() {
        $document = $_GET['id'];
        $this->model->delete($document);
        //header("Location ". constant("URL")."/user");
    }

}
