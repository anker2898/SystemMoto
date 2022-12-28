<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->rows = [];
        $this->view->data = null;
        $this->view->roles = [];
        $this->view->message = "";
        $this->view->messageHeader = "";
        $this->view->url = "";
    }

    public function render() {
        $this->view->rows = $this->model->get();
        $this->view->render('user/index');
    }

    public function new() {
        $this->view->render('user/form');
    }

    public function edit() {
        $document = $_GET["id"];
        $this->view->data = $this->model->getById($document);
        $this->view->render('user/form');
    }

    public function guardar() {
        $data = array("APELLIDO_PAT" => $_POST["apMaterno"],
            "APELLIDO_MAT" => $_POST["apPaterno"],
            "NOMBRE" => $_POST["nombre"],
            "DOCUMENTO" => $_POST["documento"],
            "EMAIL" => $_POST["correo"],
            "NUMERO" => $_POST["numero"],
            "USER" => $_POST["usuario"],
            "STATUS" => isset($_POST["activo"]) ? $_POST["activo"] : 0,
            "RESET" => isset($_POST["reset"]) ? $_POST["reset"] : 0);
        $this->view->url = "/user";
        try {
            $this->model->save($data);
            $this->view->messageHeader = "Operación exitósa";
            $this->view->message = "La operación se realizó con exito.";
        } catch (Exception $ex) {
            $this->view->messageHeader = "Operación fallida";
            $this->view->message = "Ocurrió un error al ejecutar la operación.";
        } finally {
            $this->view->render('shared/message');
        }
    }

    public function delete() {
        $this->view->dni = $_GET['id'];
        $this->view->render('user/delete');
    }

    public function deleteUser() {
        $this->view->url = "/user";
        try {
            $document = $_GET['id'];
            $this->model->delete($document);
            $this->view->messageHeader = "Operación exitósa";
            $this->view->message = "La operación se realizó con exito.";
        } catch (Exception $ex) {
            $this->view->messageHeader = "Operación fallida";
            $this->view->message = "Ocurrió un error al ejecutar la operación.";
        } finally {
            $this->view->render('shared/message');
        }
    }

}
