<?php
class StagiaireController {
    private $model;

    public function __construct() {
        require_once("../../Model/Employe/StagiaireModel.php");
        $this->model = new  StagiaireModel ();
    }
    
     
        public function guardar($name, $prenom, $cin, $address, $email, $tele, $username, $password, $ID_dep, $ID_employer,$mission, $type_stage, $date_D, $date_F, $date_creation, $image, $cv) {
            $image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
            $image_tmp = isset($_FILES['image']) ? $_FILES['image']['tmp_name'] : '';
            $image_path = 'images/' . $image;
            move_uploaded_file($image_tmp, $image_path);
    
            $cv = isset($_FILES['cv']) ? $_FILES['cv']['name'] : '';
            $cv_tmp = isset($_FILES['cv']) ? $_FILES['cv']['tmp_name'] : '';
            $cv_path = 'cvs/' . $cv;
            move_uploaded_file($cv_tmp, $cv_path);
    
            $id = $this->model->insertStagiaire($name, $prenom, $cin, $address, $email, $tele, $username, $password, $ID_dep,$ID_employer, $mission, $type_stage, $date_D, $date_F, $date_creation, $image, $cv);
    
            return ($id != false) ? header("Location: listStagiaire.php?id=" . $id) : header("Location: createStagiaire.php");
        }
    
        public function show($id) {
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:listStagiaire.php");
        }
    
        public function getAllStagiaire() {
            return ($this->model->getAllStagiaire()) ? $this->model->getAllStagiaire() : false;
        }
    
        public function updateStagiaire($ID_stagiaire, $name, $prenom, $cin, $address, $email, $tele, $username, $password, $ID_dep,$ID_employer, $mission, $type_stage, $date_D, $date_F, $date_update, $image, $cv) {
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
    
            return ($this->model->updateStagiaire($ID_stagiaire, $name, $prenom, $cin, $address, $email, $tele, $username, $password, $ID_dep,$ID_employer, $mission, $type_stage, $date_D, $date_F, $date_update, $image, $cv) != false) ? header("Location: listStagiaire.php") : null;
        }
    
        public function deleteStagiaire($ID_stagiaire) {
            $result = $this->model->deleteStagiaire($ID_stagiaire);
    
            if ($result) {
                header("Location: listStagiaire.php");
            } else {
                // Handle delete failure
            }
        }
    
        public function getAllDepartements() {
            return ($this->model->getAlldepartements()) ? $this->model->getAlldepartements() : false;
        }
    
        public function getAllemployer() {
            return ($this->model->getAllemployer()) ? $this->model->getAllemployer() : false;
        }
    }
    ?>