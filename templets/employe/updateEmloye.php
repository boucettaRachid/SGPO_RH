<?php
ob_start(); // Start output buffering.

require_once("../../controle/Employe/EmployeController.php");
$obj = new EmployeController();
$obj->updateEmployer(
    $_POST['ID_employer'],
    $_POST['name'], 
    $_POST['prenom'],
    $_POST['profe'], 
    $_POST['salaire'],
    $_POST['email'],
    $_POST['telephone'],
    $_FILES['image']['name'], // Utilisation de $_FILES pour les fichiers téléchargés
    $_POST['type_contrat'],
    $_POST['address'],
    $_POST['cin'], 
    $_FILES['cv']['name'], // Utilisation de $_FILES pour les fichiers téléchargés
    $_POST['date_D'],
    $_POST['username'], 
    $_POST['password'],
    $_POST['date_update'],
    $_POST['ID_dep']
);

ob_end_flush(); // Flush the output buffer.
require_once("../../controle/Employe/EmployeController.php");

$obj = new EmployerController();
$date = $obj->show($_GET['id']);
$departments = $obj->getAllDepartements();
?>