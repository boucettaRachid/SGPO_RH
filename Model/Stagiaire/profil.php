<?php
require '../../setting/db.php';

class UserModel
{
    private $PDO;

    public function __construct()
    {
        $db = new db(); // Create an instance of the db class
        $this->PDO = $db->conexion(); // Use the conexion() method to establish the database connection
    }

    public function getStagiaire($ID_stagiaire){
        $statement = $this->PDO->prepare("SELECT s.*, d.Name_Dep as Department_Name FROM stagiaire s LEFT JOIN departements d ON s.ID_dep = d.ID_dep WHERE ID_stagiaire = :ID_stagiaire LIMIT 1");
        $statement->bindParam(":ID_stagiaire", $ID_stagiaire, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    public function getAllStagiaire() {
        $statement = $this->PDO->prepare("SELECT s.*, d.Name_Dep as Department_Name FROM stagiaire s LEFT JOIN departements d ON s.ID_dep = d.ID_dep");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
   
}
?>
