<?php
ob_start(); // Mettre en tampon la sortie.

require_once("../../controle/Employe/StagiaireController.php");
$obj = new StagiaireController();
$obj->guardar(
  $_POST['name'],
  $_POST['prenom'],
  $_POST['cin'],
  $_POST['address'],
  $_POST['email'],
  $_POST['tele'],
  $_POST['username'],
  $_POST['password'],
  $_POST['ID_dep'],
  $_POST['ID_employer'],  // Make sure this value is an integer
  $_POST['mission'],
  $_POST['type_stage'],
  $_POST['date_D'],
  $_POST['date_F'],
  $_POST['date_creation'],
  $_POST['date_update'],
  $_FILES['image'],
  $_FILES['cv']
);

ob_end_flush(); // Afficher la sortie mise en tampon.
?>
