<?php
require_once('../controle/admin/StagiaireController.php');

// Get the action from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$userController = new UserController();

switch ($action) {
    case 'index':
        $userController->index();
        break;
    case 'create':
        $userController->create();
        break;
    case 'store':
        $userController->store();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $userController->edit($id);
        break;
    case 'update':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $userController->update($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $userController->delete($id);
        break;
    default:
        header('Location: index.php');
        break;
}
