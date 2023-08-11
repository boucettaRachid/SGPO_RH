<?php
class StagiaireModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }
    public function insertStagiaire($name, $prenom, $cin, $address, $email, $tele, $username,$password, $ID_dep,$ID_employer, $mission, $type_stage, $date_D, $date_F, $date_creation,$image,$cv) {
      $statement = $this->PDO->prepare("INSERT INTO stagiaire (Name, Prenom, Cin, Address, Email, Tele, Username, Password, ID_dep, ID_employer,Mission, Type_stage,Date_D, Date_F, Date_creation,Image ,Cv) 
      VALUES (:name, :prenom, :cin, :address,  :email, :tele, :username, :password,:ID_dep, :ID_employer, :mission, :type_stage, :date_D, :date_F, :date_creation, :image ,:cv)");
     $statement->bindParam(":name", $name);
     $statement->bindParam(":prenom", $prenom);
     $statement->bindParam(":cin", $cin);
     $statement->bindParam(":address", $address);
     $statement->bindParam(":email", $email);
     $statement->bindParam(":tele", $tele);
     $statement->bindParam(":username", $username);
     $statement->bindParam(":password", $password);
     $statement->bindParam(":ID_dep", $ID_dep);
     $statement->bindParam(":mission", $mission);
     $statement->bindParam(":type_stage", $type_stage);
     $statement->bindParam(":date_D", $date_D);
     $statement->bindParam(":date_F", $date_F);
     $statement->bindParam(":date_creation", $date_creation);
     $statement->bindParam(":image", $image);
     $statement->bindParam(":cv", $cv);
     $statement->bindParam(":ID_employer", $ID_employer);
     
     return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
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

public function updateStagiaire($ID_stagiaire, $name, $prenom, $cin, $address, $email, $tele, $username, $password, $ID_dep , $ID_employer,  $mission, $type_stage, $date_D, $date_F, $date_update,$image,$cv) {
 $statement = $this->PDO->prepare("UPDATE stagiaire SET Name = :name, Prenom = :prenom, Cin = :cin, Address = :address, Email = :email, Tele = :tele, Username = :username, Password = :password, ID_dep = :ID_dep, ID_employer = :ID_employer, Mission = :mission, Type_stage = :type_stage, Date_D = :date_D, Date_F = :date_F, Date_update = :date_update ,Image = :image , Cv = :cv WHERE ID_stagiaire = :ID_stagiaire");
 $statement->bindParam(":name", $name);
 $statement->bindParam(":prenom", $prenom);
 $statement->bindParam(":cin", $cin);
 $statement->bindParam(":address", $address);
 $statement->bindParam(":email", $email);
 $statement->bindParam(":tele", $tele);
 $statement->bindParam(":username", $username);
 $statement->bindParam(":password", $password);
 $statement->bindParam(":ID_dep", $ID_dep);
 $statement->bindParam(":mission", $mission);
 $statement->bindParam(":type_stage", $type_stage);
 $statement->bindParam(":date_D", $date_D);
 $statement->bindParam(":date_F", $date_F);
 $statement->bindParam(":date_update", $date_update);
 $statement->bindParam(":ID_stagiaire", $ID_stagiaire);
 $statement->bindParam(":image", $image);
 $statement->bindParam(":cv", $cv);
 $statement->bindParam(":ID_employer", $ID_employer);
 return ($statement->execute()) ? $ID_stagiaire : false;
}

public function deleteStagiaire($ID_stagiaire){
 $statement = $this->PDO->prepare("DELETE FROM stagiaire WHERE ID_stagiaire = :ID_stagiaire");
 $statement->bindParam(":ID_stagiaire", $ID_stagiaire);
 return ($statement->execute()) ? true : false;
}

public function getAlldepartements() {
 $statement = $this->PDO->prepare("SELECT ID_dep, Name_Dep FROM departements");
 return ($statement->execute()) ? $statement->fetchAll() : false;
}
public function getAllemployer() {
 $statement = $this->PDO->prepare("SELECT ID_employer, Name FROM employer");
 return ($statement->execute()) ? $statement->fetchAll() : false;
}


}
?>
