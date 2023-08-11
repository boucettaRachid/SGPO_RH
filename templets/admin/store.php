<?php
ob_start(); // Mettre en tampon la sortie.

require_once("../../controle/admin/AdminController.php");
$obj = new AdminController();
$obj->guardar(
$_POST['name'], 
$_POST['prenom'], 
$_POST['email'], 
$_POST['tele'], 
$_POST['profession'], 
$_POST['password'], 
$_POST['date_creation'],
$_POST['image'],
$_POST['role']);

ob_end_flush(); // Afficher la sortie mise en tampon.
?>
