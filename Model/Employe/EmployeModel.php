<?php
class EmployeModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

   
    public function show($id){
        $statement = $this->PDO->prepare("SELECT * FROM employer WHERE ID_employer = :id LIMIT 1");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    public function getAllEmployer() {
        $statement = $this->PDO->prepare("SELECT * FROM employer");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $image, $type_contrat, $address, $cin, $cv, $date_D, $username, $password, $date_update, $date_cration, $ID_dep) {
        $statement = $this->PDO->prepare("UPDATE employer SET Name = :name, Prenom = :prenom, Profe = :profe, Salaire = :salaire, Email = :email, Telephone = :telephone, Image = :image, Type_contrat = :type_contrat, Address = :address, Cin = :cin, Cv = :cv, Date_D = :date_D, Username = :username, Password = :password, Date_update = :date_update, Date_cration = :date_cration, ID_dep = :ID_dep WHERE ID_employer = :ID_employer");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":prenom", $prenom);
        $statement->bindParam(":profe", $profe);
        $statement->bindParam(":salaire", $salaire);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":telephone", $telephone);
        $statement->bindParam(":image", $image);
        $statement->bindParam(":type_contrat", $type_contrat);
        $statement->bindParam(":address", $address);
        $statement->bindParam(":cin", $cin);
        $statement->bindParam(":cv", $cv);
        $statement->bindParam(":date_D", $date_D);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":date_update", $date_update);
        $statement->bindParam(":date_cration", $date_cration);
        $statement->bindParam(":ID_dep", $ID_dep);
        $statement->bindParam(":ID_employer", $ID_employer);
        return ($statement->execute()) ? $ID_employer : false;
    }

 
    public function getAlldepartements() {
        $statement = $this->PDO->prepare("SELECT ID_dep, Name_Dep FROM departements");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}