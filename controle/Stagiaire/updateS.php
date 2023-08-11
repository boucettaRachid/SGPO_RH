<?php
ob_start(); // Start output buffering.

require_once("D:/wamp64/www/SGPO_RH/controle/Stagiaire/StagiaireController.php");
$obj = new StagiaireController();

// Check if the necessary form fields are submitted
if ( isset($_POST['username']) && isset($_POST['password'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $obj->updateS($id, $username, $password);
}
ob_end_flush(); /*
require_once("D:/wamp64/www/SGPO_RH/controle/Stagiaire/StagiaireController.php");

     $obj = new StagiaireController();
    $date = $obj->show($_GET['id']);
*/
?>
