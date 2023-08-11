<?php
class PointageModel {
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

    public function getPointageHistory($id){
        $statement = $this->PDO->prepare("SELECT `stagiaire`.`Name`, `stagiaire`.`Prenom`, `pointage`.`Date-E`, `pointage`.`Date-S` 
        FROM `stagiaire` 
        JOIN `pointage` ON `stagiaire`.`ID_stagiaire` = `pointage`.`ID_stagiaire` 
        WHERE `stagiaire`.`ID_stagiaire` = :id
        ORDER BY `pointage`.`Date-S` DESC");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }
}
?>

