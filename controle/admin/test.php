<?php

require '../../Model/admin/StagiaireModel.php';

$msg = '';
if (isset($_POST['update'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['Name']) ? $_POST['Name'] : '';
    $prenom = isset($_POST['Prenom']) ? $_POST['Prenom'] : '';
    $cin = isset($_POST['Cin']) ? $_POST['Cin'] : '';
    $address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
    $image_tmp = isset($_FILES['image']) ? $_FILES['image']['tmp_name'] : '';
    $tele = isset($_POST['Tele']) ? $_POST['Tele'] : '';
    $cv = isset($_FILES['cv']) ? $_FILES['cv']['name'] : '';
    $cv_tmp = isset($_FILES['cv']) ? $_FILES['cv']['tmp_name'] : '';
    $username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $mission = isset($_POST['Mission']) ? $_POST['Mission'] : '';
    $type_stage = isset($_POST['Type_stage']) ? $_POST['Type_stage'] : '';
    $date_D = isset($_POST['Date_D']) ? $_POST['Date_D'] : date('Y-m-d');
    $date_F = isset($_POST['Date_F']) ? $_POST['Date_F'] : date('Y-m-d');

    // Upload image file
    move_uploaded_file($image_tmp, "images/$image");

    // Upload CV file
    move_uploaded_file($cv_tmp, "../../templets/admin/cvs/$cv");

    $data = [$name, $prenom, $cin, $address, $email, $image, $tele, $cv, $username, $password, $mission, $type_stage, $date_D, $date_F];

    $model = new StagiaireModel();
    $stagiaire = $model->getStagiaire($id);
    $model->updateStagiaire($id, $data);

    $msg = 'Updated Successfully!';
    header('Location:../../templets/admin/home.php');
    exit;
}
include '../../templets/admin/updateS.php'; // Load the view