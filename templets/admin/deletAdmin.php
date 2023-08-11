<?php
    require_once("D:\wamp64\www\SGPO_RH\controle\admin\AdminController.php");
    $obj = new AdminController();
    $obj->deleteAdmin($_GET['id']);

?>
