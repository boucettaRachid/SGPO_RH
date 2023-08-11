<?php
session_start();
include '../../Model/admin/loginA.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $model = new UserModel();
    $user = $model->getUser($_POST['uname'], $_POST['password']);

    if ($user) {
        $_SESSION['user_name'] = $user['Email'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['id'] = $user['ID_admin'];
        header("Location: ../../templets/admin/index.php");
        exit();
    } else {
        header("Location: ../../templets/admin/login.php?error=Incorrect User name or password");
        exit();
    }
} else {
    header("Location: ../../templets/admin/login.php");
    exit();
}
?>
