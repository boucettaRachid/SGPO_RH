<?php
class EmployeController {
    private $model;

    public function __construct() {
        require_once('../../Model/Employe/EmployeModel.PHP');
        $this->model = new EmployeModel();
    }
    public function show($id){
        return ($this->model->show($id) != false) ? $this->model->show($id) : false;
    }

    public function getAllEmployer(){
        $employers = $this->model->getAllEmployer();
        return ($employers) ? $employers : false;
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
        $ID_dep = isset($_POST['ID_dep']) ? $_POST['ID_dep'] : null;

        $statement->bindParam(":ID_dep", $ID_dep);
        $statement->bindParam(":ID_employer", $ID_employer);
        return ($statement->execute()) ? $ID_employer : false;
    }

}
  
