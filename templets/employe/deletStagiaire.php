
<?php

    require_once("../../controle/Employe/StagiaireController.php");
    $obj = new StagiaireController();
    $obj->deleteStagiaire($_GET['id']);

?>