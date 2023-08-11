<?php
ob_start(); // Mettre en tampon la sortie.

require_once("../../controle/admin/EmployeController.php");
$obj = new EmployerController();
$obj->guardar(
    $_POST['name'],
    $_POST['prenom'],
    $_POST['profe'],
    $_POST['salaire'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['image'],
    $_POST['type_contrat'],
    $_POST['address'],
    $_POST['cin'],
    $_POST['cv'],
    $_POST['Date_D'],
    $_POST['username'],
    $_POST['password'],
    $_POST['date_creation'],
    $_POST['ID_dep']
);

ob_end_flush(); // Afficher la sortie mise en tampon.
?>
