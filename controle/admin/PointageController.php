<?php
class PointageController {
    private $model;

    public function __construct() {
        require_once("../../Model/admin/PointageModel.php");
        $this->model = new PointageModel();
    }

    public function getStagiaireInfo($id) {
        $stagiaireInfo = $this->model->getStagiaireInfo($id);
        if ($stagiaireInfo !== false) {
            // Handle the stagiaire info, e.g., display it or pass it to a view
            return $stagiaireInfo;
        } else {
            header("Location: pointage-stagiaire.php");
            exit; // Make sure to exit after redirection
        }
    }

    public function getPointageHistory($id) {
        $pointageHistory = $this->model->getPointageHistory($id);
        if ($pointageHistory !== false) {
            // Handle the pointage history, e.g., display it or pass it to a view
            return $pointageHistory;
        } else {
            header("Location: pointage-stagiaire.php");
            exit; // Make sure to exit after redirection
        }
    }
}
?>
