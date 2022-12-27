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
    
}