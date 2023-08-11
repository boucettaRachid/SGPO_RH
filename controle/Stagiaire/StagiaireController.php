<?php
class StagiaireController {
    private $model;

    public function __construct() {
        require_once("../../Model/Stagiaire/StagiaireModel.php");
        $this->model = new  StagiaireModel ();
    }

  
    public function show($id){
        return ($this->model->show($id) != false) ? $this->model->show($id) : false;
    }

    public function getAllStagiaire(){
        
        return ($this->model->getAllStagiaire()) ? $this->model->getAllStagiaire() : false;
    }

   
}
?>
