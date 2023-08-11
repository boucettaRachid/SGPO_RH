<?php
session_start();
include '../../Model/Employe/loginE.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $model = new UserModel();
    $user = $model->getUser($_POST['uname'], $_POST['password']);

    if ($user) {
        $_SESSION['user_name'] = $user['Username'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['id'] = $user['ID_employer'];
        header("Location: ../../templets/employer/index.php");
        exit();
    } else {
        header("Location: ../../templets/employer/login.php?error=Incorrect User name or password");
        exit();
    }
} else {
    header("Location: ../../templets/employer/login.php");
    exit();
}
?>
