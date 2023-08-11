<?php
ob_start(); // Mettre en tampon la sortie.

require_once("D:\wamp64\www\SGPO_RH\controle\admin\EmployeController.php");
$obj = new EmployerController();
$obj->updateEmployer(
    $_POST['ID_employer'],
    $_POST['name'], 
    $_POST['prenom'],
     $_POST['cin'], 
     $_POST['address'],
      $_POST['email'],
       $_POST['telephone'],
       $_POST['username'], 
       $_POST['password'],
        $_POST['ID_dep'], 
        $_POST['salaire'],
         $_POST['type_contrat'],
          $_POST['date_D'],
          $_POST['profe'], 
          $_POST['date_cration'], 
          $_POST['date_update'],
          $_POST['cv'],
          $_POST['image']
);

ob_end_flush(); // Afficher la sortie mise en tampon.



?>

