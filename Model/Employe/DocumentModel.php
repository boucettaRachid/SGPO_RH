<?php
class DocumentModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function getStagiaireInfo($id){
        $statement = $this->PDO->prepare("SELECT `Name`, `Prenom` FROM `stagiaire` WHERE `ID_stagiaire` = :id LIMIT 1");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function getDocumentHistory($id){
        $statement = $this->PDO->prepare("SELECT `stagiaire`.`Name`, `stagiaire`.`Prenom`, `document`.`Type_Doc`,`document`.`Name_Doc`
        FROM `stagiaire` 
        JOIN `document` ON `stagiaire`.`ID_stagiaire` = `document`.`ID_stagiaire` 
        WHERE `stagiaire`.`ID_stagiaire` = :id
        ORDER BY `document`.`Name_Doc` DESC");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }
}
?>

