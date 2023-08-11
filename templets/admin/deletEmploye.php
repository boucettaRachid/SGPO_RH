
<?php
    require_once("D:\wamp64\www\SGPO_RH\controle\admin\EmployeController.php");
    $obj = new EmployerController();
    $obj->deleteEmployer($_GET['id']);

?>