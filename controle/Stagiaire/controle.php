<?php
session_start();
include '../../Model/Stagiaire/loginS.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $model = new UserModel();
    $user = $model->getUser($_POST['uname'], $_POST['password']);

    if ($user) {
        $_SESSION['user_name'] = $user['Username'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['id'] = $user['ID_stagiaire'];
        $id=$user['ID_stagiaire'];
        header("Location: ../../templets/stagiaire/index.php?id=$id");
        exit();
    } else {
        header("Location: ../../templets/stagiaire/login.php?error=Incorrect User name or password");
        exit();
    }
} else {
    header("Location: ../../templets/stagiaire/login.php");
    exit();
}
?>
