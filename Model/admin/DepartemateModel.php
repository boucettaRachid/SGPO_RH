<?php
class DepartemateModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    
        public function insertDepartement($nameDep, $dateCreation) {
            $statement = $this->PDO->prepare("INSERT INTO
             departements (Name_Dep, Date_cration) VALUES (?, ?)");
            $statement->bindParam(1, $nameDep);
            $statement->bindParam(2, $dateCreation);
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }
    
        public function getDepartement($id) {
            $statement = $this->PDO->prepare("SELECT * FROM departements WHERE ID_dep = ? LIMIT 1");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
    
        public function getAllDepartements() {
            $statement = $this->PDO->prepare("SELECT * FROM departements");
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
    
        public function updateDepartement($idDep, $nameDep, $dateUpdate) {
            $statement = $this->PDO->prepare("UPDATE departements SET Name_Dep = ?, Date_update = ? WHERE ID_dep = ?");
            $statement->bindParam(1, $nameDep);
            $statement->bindParam(2, $dateUpdate);
            $statement->bindParam(3, $idDep);
            return ($statement->execute()) ? $idDep : false;
        }
        
    
        public function deleteDepartement($idDep) {
            $statement = $this->PDO->prepare("DELETE FROM departements WHERE ID_dep = ?");
            $statement->bindParam(1, $idDep);
            return ($statement->execute()) ? true : false;
        }
    }
    ?>