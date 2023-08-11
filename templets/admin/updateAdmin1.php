<?php
ob_start(); // Mettre en tampon la sortie.

require_once("../../controle/Admin/AdminController.php");
$obj = new AdminController();
$obj->update(
    $_POST['id_admin'],
    $_POST['name'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['profession'],
    $_POST['password'],
    $_POST['role']
);

ob_end_flush(); // Afficher la sortie mise en tampon.


    require_once("../../controle/Admin/AdminController.php");
    $obj = new AdminController();
    $date = $obj->show($_GET['id']);

?>

