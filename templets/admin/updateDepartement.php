<?php


require_once("../../controle/admin/DepartemateController.php");
$obj = new DepartemateController();
$obj->updateDepartement(
    $_POST['ID_dep'],
    $_POST['Name_Dep'],
    $_POST['Date_update'],

);



    require_once("../../controle/admin/DepartemateController.php");
    $obj = new DepartemateController();
    $date = $obj->showDepartement($_GET['id']);

?>
