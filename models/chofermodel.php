<?php

class ChoferModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $sql = "CALL SP_SEL_CHOFER()";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute();
        $resultDb = $stm->fetchAll();
        $result = array();
        foreach ($resultDb as $value) {
            $data = array(
                $value["DOCUMENTO"],
                $value["NOMBRE"],
                $value["APELLIDO_PAT"],
                $value["BREVETE"],
                $value["VENCIMIENTO"],
                $value["ANTECEDENTES"]  
            );
            array_push($result, $data);
        }
        return $result;
    }

    public function delete($document) {
        $sql = "CALL SP_DEL_CHOFER(:P_SDOCUMENT)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $document, PDO::PARAM_STR);
        $stm->execute();
    }

    public function save($data) {
        $sql = "CALL SP_INS_CHOFER(:P_SDOCUMENT, :P_SNOMBRE, :P_SAPELLIDO_PAT, :P_SAPELLIDO_MAT, :P_SEMAIL, :P_SNUMBER, :P_SBREVETE, :P_DVENCIMIENTO, :P_SANTECEDENTES)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $data["DOCUMENTO"], PDO::PARAM_STR);
        $stm->bindValue(':P_SNOMBRE', $data["NOMBRE"], PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_PAT', $data["APELLIDO_PAT"], PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_MAT', $data["APELLIDO_MAT"], PDO::PARAM_STR);
        $stm->bindValue(':P_SEMAIL', $data["EMAIL"], PDO::PARAM_STR);
        $stm->bindValue(':P_SNUMBER', $data["NUMERO"], PDO::PARAM_STR);
        $stm->bindValue(':P_SBREVETE', $data["BREVETE"], PDO::PARAM_STR);
        $stm->bindValue(':P_DVENCIMIENTO', $data["VENCIMIENTO"], PDO::PARAM_STR);
        $stm->bindValue(':P_SANTECEDENTES', $data["RUTA"], PDO::PARAM_STR);
        $stm->execute();
    }

    public function getById($document) {
        $sql = "CALL SP_SEL_CHOFER_DNI(:P_SDOCUMENT)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $document, PDO::PARAM_STR);
        $stm->execute();
        $resultDb = $stm->fetchAll();
        $result = sizeof($resultDb) >= 1 ? $resultDb[0] : [];
        return $result;
    }

}