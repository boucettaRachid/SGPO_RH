<?php
class DocumentController {
    private $model;

    public function __construct() {
        require_once("../../Model/Employe/DocumentModel.php");
        $this->model = new DocumentModel();
    }

    public function getStagiaireInfo($id) {
        $stagiaireInfo = $this->model->getStagiaireInfo($id);
        if ($stagiaireInfo !== false) {
            // Handle the stagiaire info, e.g., display it or pass it to a view
            return $stagiaireInfo;
        } else {
            header("Location: document.php");
            exit; // Make sure to exit after redirection
        }
    }

    public function getdocumentHistory($id) {
        $pointageHistory = $this->model->getDocumentHistory($id);
        if ($pointageHistory !== false) {
            // Handle the pointage history, e.g., display it or pass it to a view
            return $pointageHistory;
        } else {
            header("Location: document.php");
            exit; // Make sure to exit after redirection
        }
    }
}
?>