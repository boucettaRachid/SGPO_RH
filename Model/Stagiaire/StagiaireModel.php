<?php
class StagiaireModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }
      
    
        public function show($id){
            $statement = $this->PDO->prepare("SELECT * FROM stagiaire WHERE ID_stagiaire = :id LIMIT 1");
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

    public function getAllStagiaire() {
        $statement = $this->PDO->prepare("SELECT * FROM stagiaire");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
  
   
}
?>
