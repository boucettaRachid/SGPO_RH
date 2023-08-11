<?php
class AdminModel {
    private $PDO;

    public function __construct() {
        require_once("D:\wamp64\www\SGPO_RH\setting\db.php");
                $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertar($name, $prenom, $email, $telephone, $profession, $password, $date_creation, $date_update, $role) {
        $statement = $this->PDO->prepare("INSERT INTO admin (Name, Prenom, Email, Telephone, Profession, Password, Date_creation, Date_update, Role) VALUES (:name, :prenom, :email, :telephone, :profession, :password, :date_creation, :date_update, :role)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":prenom", $prenom);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":telephone", $telephone);
        $statement->bindParam(":profession", $profession);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":date_creation", $date_creation);
        $statement->bindParam(":date_update", $date_update);
        $statement->bindParam(":role", $role);
        
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
        public function show($id){
            $statement = $this->PDO->prepare("SELECT * FROM admin WHERE ID_admin = :id LIMIT 1");
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
    
        public function getAllAdmin() {
            $statement = $this->PDO->prepare("SELECT * FROM admin");
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function update($id_admin, $name, $prenom, $email, $telephone, $profession, $password, $role) {
            $statement = $this->PDO->prepare("UPDATE admin SET Name = :name, Prenom = :prenom, Email = :email, Telephone = :telephone, Profession = :profession, Password = :password, Role = :role WHERE ID_admin = :id_admin");
            $statement->bindParam(":name", $name);
            $statement->bindParam(":prenom", $prenom);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":telephone", $telephone);
            $statement->bindParam(":profession", $profession);
            $statement->bindParam(":password", $password);
            $statement->bindParam(":role", $role);
            $statement->bindParam(":id_admin", $id_admin);
            return ($statement->execute()) ? $id_admin : false;
        }
        
        public function deleteAdmin($id_admin){
            $statement = $this->PDO->prepare("DELETE FROM admin WHERE ID_admin = :id_admin");
            $statement->bindParam(":id_admin", $id_admin);
            return ($statement->execute()) ? true : false;
        }
        
        
}
?>
