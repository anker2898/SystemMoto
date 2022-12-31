<?php

class Chofer extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->url = "/chofer";
        $this->view->rows = [];
        $this->view->dni = "";
        $this->view->data = [];
        $this->view->url = "/chofer";
    }

    public function render() {
        $this->view->rows = $this->model->get();
        $this->view->render('chofer/index');
    }

    public function new() {
        $this->view->render('chofer/form');
    }

    public function edit() {
        $this->view->data = $this->model->getById($_GET["id"]);
        $this->view->render('chofer/form');
    }

    public function delete() {
        $this->view->dni = $_GET['id'];
        $this->view->render('chofer/delete');
    }

    public function deleteChofer() {
        $this->view->url = "/chofer";
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

    public function guardar() {
        try {
            $subir_archivo = constant("ANT") . basename($_POST["documento"] . ".pdf");
            $data = array("APELLIDO_PAT" => $_POST["apPaterno"],
                "APELLIDO_MAT" => $_POST["apMaterno"],
                "NOMBRE" => $_POST["nombre"],
                "DOCUMENTO" => $_POST["documento"],
                "EMAIL" => $_POST["correo"],
                "NUMERO" => $_POST["numero"],
                "BREVETE" => $_POST["brevete"],
                "VENCIMIENTO" => $_POST["vencimiento"],
                "RUTA" => $subir_archivo);
            if ($_FILES["file"]["size"] > 0) {
                if (!move_uploaded_file($_FILES["file"]["tmp_name"], $subir_archivo)) {
                    throw new Exception("Archivo no cargado");
                }
            }
            $this->model->save($data);
            $this->view->messageHeader = "Operación exitósa";
            $this->view->message = "La operación se realizó con exito.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $this->view->messageHeader = "Operación fallida";
            $this->view->message = "Ocurrió un error al ejecutar la operación.";
        } finally {
            $this->view->render('shared/message');
        }
    }

}
