<?php
class EmployerController {
    private $model;

    public function __construct() {
        require_once('../../Model/admin/EmployerModel.PHP');
        $this->model = new EmployerModel();
    }

    public function guardar($name, $prenom, $profe, $salaire, $email, $telephone, $type_contrat, $address, $cin, $Date_D, $username, $password,  $date_creation, $ID_dep, $image, $cv) {
        $image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
        $image_tmp = isset($_FILES['image']) ? $_FILES['image']['tmp_name'] : '';

        $cv = isset($_FILES['cv']) ? $_FILES['cv']['name'] : '';
        $cv_tmp = isset($_FILES['cv']) ? $_FILES['cv']['tmp_name'] : '';

        $image_path = 'images/' . $image;
        move_uploaded_file($image_tmp, $image_path);

        // Handle CV upload
        $cv_path = 'cvs/' . $cv;
        move_uploaded_file($cv_tmp, $cv_path);
        $id = $this->model->insertEmployer($name, $prenom, $profe, $salaire, $email, $telephone, $type_contrat, $address, $cin, $Date_D, $username, $password, $date_creation, $ID_dep, $image, $cv);
        return ($id != false) ? header("Location: listEmploye.php?id=" . $id) : header("Location: createEmploye.php");
    }
    public function show($id) {
        return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:listEmploye.php");
    }
    public function getAllEmployer() {
        return ($this->model->getAllEmployer()) ? $this->model->getAllEmployer() : false;
    }

    public function updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $image, $type_contrat, $address, $cin, $cv, $date_D, $username, $password, $date_update, $ID_dep) {
        // Handle image upload
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $image_path = 'images/' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        } else {
            $image = isset($_POST['image_old']) ? $_POST['image_old'] : '';
        }
    
             // Handle CV upload
             if (!empty($_FILES['cv']['name'])) {
                $cv = $_FILES['cv']['name'];
                $cv_path = 'cvs/' . $cv;
                move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
            } else {
                $cv = isset($_POST['cv_old']) ? $_POST['cv_old'] : '';
            }
            return ($this->model->updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $image, $type_contrat, $address, $cin, $cv, $date_D, $username, $password, $date_update, $ID_dep) != false) ?: header("Location:listEmploye.php") ;
        }
  
    public function deleteEmployer($ID_employer) {
        $result = $this->model->deleteEmployer($ID_employer);
        if ($result) {
            header("Location:listEmploye.php");
        } else {
            // Handle delete failure
        }
    }
    public function getAllDepartements() {
        return ($this->model->getAlldepartements()) ? $this->model->getAlldepartements() : false;
    }

}
  
