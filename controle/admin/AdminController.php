<?php
class AdminController {
    private $model;

    public function __construct() {
        require_once("../../Model/Admin/AdminModel.php");
        $this->model = new AdminModel();
    }

    public function guardar($name, $prenom, $email, $telephone, $profession, $password, $date_creation, $date_update, $role) {
        $id = $this->model->insertar($name, $prenom, $email, $telephone, $profession, $password, $date_creation, $date_update, $role);
        return ($id != false) ? header("Location: listAdmin.php?id=" . $id) : header("Location: createAdmin.php");
    }
    public function show($id){
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:listAdmin.php");
    }
    public function getAllAdmin(){
        return ($this->model->getAllAdmin()) ? $this->model->getAllAdmin() : false;
    }
    public function update($id_admin, $name, $prenom, $email, $telephone, $profession, $password, $role){
        return ($this->model->update($id_admin, $name, $prenom, $email, $telephone, $profession, $password, $role) != false) ?: header("Location:listAdmin.php") ;
    }
 
  
    public function deleteAdmin($id) {
        $result = $this->model->deleteAdmin($id);
        if ($result) {
            header("Location:listAdmin.php");
        } else {
            // Handle delete failure
        }
    }

}
?>
