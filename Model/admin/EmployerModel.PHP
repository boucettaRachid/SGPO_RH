<?php
class EmployerModel {
    private $PDO;

    public function __construct() {
        require_once("../../setting/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertEmployer($name, $prenom, $profe, $salaire,
        $email, $telephone, $image, $type_contrat, $address, $cin,
        $cv, $Date_D, $username, $password, $date_creation, $ID_dep) {
        $statement = $this->PDO->prepare("INSERT INTO employer (Name, Prenom, Profe, Salaire, Email, Telephone, Image, Type_contrat, Address, Cin, Cv, Date_D, Username, Password, Date_creation, ID_dep) VALUES (:name, :prenom, :profe, :salaire, :email, :telephone, :image, :type_contrat, :address, :cin, :cv, :Date_D, :username, :password, :date_creation,:ID_dep)");
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
        $statement->bindParam(":Date_D", $Date_D);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $date_creation = date('Y-m-d H:i:s');
        $statement->bindParam(":date_creation", $date_creation);
        $statement->bindParam(":ID_dep", $ID_dep);
        $ID_dep = isset($_POST['ID_dep']) ? intval($_POST['ID_dep']) : 0;
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;

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

    public function updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $image, $type_contrat, $address, $cin, $cv, $date_D, $username, $password, $date_update, $ID_dep) {
        $statement = $this->PDO->prepare("UPDATE employer SET Name = :name, Prenom = :prenom, Profe = :profe, Salaire = :salaire, Email = :email, Telephone = :telephone, Image = :image, Type_contrat = :type_contrat, Address = :address, Cin = :cin, Cv = :cv, Date_D = :date_D, Username = :username, Password = :password, Date_update = :date_update, ID_dep = :ID_dep WHERE ID_employer = :ID_employer");
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
        $date_update = date('Y-m-d H:i:s');
        $statement->bindParam(":date_update", $date_update);
        $statement->bindParam(":ID_dep", $ID_dep);
        $statement->bindParam(":ID_employer", $ID_employer);
        return ($statement->execute()) ? $ID_employer : false;
    }

    public function deleteEmployer($ID_employer) {
        $statement = $this->PDO->prepare("DELETE FROM employer WHERE ID_employer = :ID_employer");
        $statement->bindParam(":ID_employer", $ID_employer);
        return ($statement->execute()) ? true : false;
    }
    public function getAlldepartements() {
        $statement = $this->PDO->prepare("SELECT ID_dep, Name_Dep FROM departements");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

}