<?php
class EmployerController {
    private $model;

    public function __construct() {
        require_once("D:\wamp64\www\SGPO_RH\Model\admin\EmployerModel.php");
        $this->model = new EmployerModel();
    }

    public function guardar($name, $prenom, $profe, $salaire, $email, $telephone, $type_contrat, $address, $cin, $Date_D, $username, $password, $date_cration, $date_update, $ID_dep, $image, $cv) {
        $image_path = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

        // Handle CV upload
        $cv_path = 'cvs/' . $_FILES['cv']['name'];
        move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
        $id = $this->model->insertEmployer($name, $prenom, $profe, $salaire, $email, $telephone, $image, $type_contrat, $address, $cin, $cv, $Date_D, $username, $password, $date_cration, $date_update, $ID_dep);
        return ($id != false) ? header("Location: listEmployer.php?id=" . $id) : header("Location: createEmployer.php");
    }
    
    public function show($id){
        return ($this->model->getEmployer($id) != false) ? $this->model->getEmployer($id) : header("Location:listEmployer.php");
    }

    public function getAllEmployer(){
        return ($this->model->getAllEmployer()) ? $this->model->getAllEmployer() : false;
    }

    public function updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $type_contrat, $address, $cin, $date_D, $username, $password, $date_update,$ID_dep) {
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
        return ($this->model->updateEmployer($ID_employer, $name, $prenom, $profe, $salaire, $email, $telephone, $type_contrat, $address, $cin, $date_D, $username, $password, $date_update,  $ID_dep) != false) ?: header("Location:listEmployer.php");
    }
  
    public function deleteEmployer($ID_employer) {
        return ($this->model->deleteEmployer($ID_employer)) ? :  header("Location:listEmployer.php");
    }
}
?>
