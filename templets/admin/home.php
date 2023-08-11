<?php
// Include necessary files and classes
require '../../controle/admin/StagiaireController.php';

// Create an instance of the StagiaireController class
$controller = new StagiaireController();

// Check for actions (e.g., creating, updating, deleting) and handle accordingly
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'create':
            $controller->createStagiaire();
            break;
        case 'update':
            $stagiaireId = $_GET['id'];
            $controller->updateStagiaire($stagiaireId);
            break;
        case 'delete':
            $stagiaireId = $_GET['id'];
            $controller->deleteStagiaire($stagiaireId);
            break;
        default:
            // Handle other actions or show a default view
            break;
    }
} else {
    // Show the list of all stagiaires (view all)
    $controller->getAllStagiaires();
}
?>
