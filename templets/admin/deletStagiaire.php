
<?php
    require_once("D:\wamp64\www\SGPO_RH\controle\admin\StagiaireController.php");
    $obj = new StagiaireController();
    $obj->deleteStagiaire($_GET['id']);

?>