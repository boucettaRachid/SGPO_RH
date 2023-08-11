<?php
class DepartemateController {
    private $model;

    public function __construct() {
        require_once("../../Model/admin/DepartemateModel.php");
        $this->model = new DepartemateModel();
    }

    public function guardarDepartement($nameDep, $dateCreation) {
        $idDep = $this->model->insertDepartement($nameDep, $dateCreation);
        return ($idDep != false) ? header("Location: ../../templets/admin/listDepartements.php?id=" . $idDep) : header("Location: ../../templets/admin/createDepartement.php");
    }

    public function showDepartement($idDep) {
        return ($this->model->getDepartement($idDep) != false) ? $this->model->getDepartement($idDep) : header("Location:../../templets/admin/listDepartements.php");
    }

    public function getAllDepartements() {
        return ($this->model->getAllDepartements()) ? $this->model->getAllDepartements() : false;
    }

    public function updateDepartement($idDep, $nameDep, $dateUpdate) {
        return ($this->model->updateDepartement($idDep, $nameDep, $dateUpdate) != false) ?: header("Location: ../../templets/admin/listDepartements.php");
    }

    public function deleteDepartement($idDep) {
        $result = $this->model->deleteDepartement($idDep);
        if ($result) {
            header("Location: ../../templets\admin\listDepartements.php");
        } else {
            // Gérer l'échec de la suppression
        }
    }
}
?>
