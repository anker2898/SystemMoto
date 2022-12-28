<?php

class UserModel extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get() {
        $sql = "CALL SP_SEL_USER(:P_SUSER)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SUSER', $_SESSION['user']['USUARIO'], PDO::PARAM_STR);
        $stm->execute();
        $resultDb = $stm->fetchAll();
        $result = array();
        foreach ($resultDb as $value) {
            $data = array(
                $value["USUARIO"],
                $value["ESTADO"],
                $value["NOMBRE"],
                $value["APELLIDO_PAT"],
                $value["APELLIDO_MAT"],
                $value["DOCUMENTO"]
            );
            array_push($result, $data);
        }
        return $result;
    }
    
    public function delete ($document) {
        $sql = "CALL SP_DEL_USER(:P_SDOCUMENT)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $document, PDO::PARAM_STR);
        $stm->execute();
    }
    
    public function save($data) {
        $sql = "CALL SP_INS_USER(:P_SDOCUMENT, :P_SNOMBRE, :P_SAPELLIDO_PAT, :P_SAPELLIDO_MAT, :P_SEMAIL, :P_SNUMBER, :P_NSTATUS, :P_SUSER, :P_BPASSWORD_RESET)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $data["DOCUMENTO"], PDO::PARAM_STR);
        $stm->bindValue(':P_SNOMBRE', $data["NOMBRE"], PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_PAT', $data["APELLIDO_PAT"], PDO::PARAM_STR);
        $stm->bindValue(':P_SAPELLIDO_MAT', $data["APELLIDO_MAT"], PDO::PARAM_STR);
        $stm->bindValue(':P_SEMAIL', $data["EMAIL"], PDO::PARAM_STR);
        $stm->bindValue(':P_SNUMBER', $data["NUMERO"], PDO::PARAM_STR);
        $stm->bindValue(':P_NSTATUS', $data["STATUS"], PDO::PARAM_INT);
        $stm->bindValue(':P_SUSER', $data["USER"], PDO::PARAM_STR);
        $stm->bindValue(':P_BPASSWORD_RESET', $data["RESET"], PDO::PARAM_INT);
        $stm->execute();
    }    
    
    public function getById($document) {
        $sql = "CALL SP_SEL_USER_DNI(:P_SDOCUMENT)";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->bindValue(':P_SDOCUMENT', $document, PDO::PARAM_STR);
        $stm->execute();
        $resultDb = $stm->fetchAll();
        $result = sizeof($resultDb) >= 1? $resultDb[0]: [];
        return $result;
    }
    
    public function getRoles() {
        $sql = "CALL SP_SEL_ROLES()";
        $stm = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute();
        return $stm->fetchAll();
    }
}