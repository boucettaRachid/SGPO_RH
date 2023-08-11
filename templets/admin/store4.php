<?php
ob_start(); // Mettre en tampon la sortie.

require_once("../../controle/admin/DepartemateController.php");
$obj = new DepartemateController();
$obj->guardarDepartement(
$_POST['Name_Dep'],
$_POST['Date_cration'],
);

ob_end_flush(); // Afficher la sortie mise en tampon.
?>
