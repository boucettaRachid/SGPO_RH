<?php
session_start();
include 'header.php';

require_once("D:\wamp64\www\SGPO_RH\controle\admin\AdminController.php");
$obj = new AdminController();
$date = $obj->show($_GET['id']);
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>SGPO</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    
  </head>
  <body>

  <form action="updateAdmin.php" method="post"enctype="multipart/form-data">
  <div class="content-wrapper">
              <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
               <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
                  <div class="card mb-4">
                    <h5 class="card-header" >Mettre à jour le stagiaire <?=$date['Name']?></h5>
                 
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
             
                        <div class="card-body">

    <div class="row">
      <div class="mb-3 col-md-6">
      <div class="col-sm-10">
                <input  type="hidden" name="id_admin" class="form-control" id="id_admin" value="<?= $date['ID_admin'] ?>">
            </div>
        <label for="Name" class="form-label">Nom</label>
        <input type="text" class="form-control" name="name" value="<?=$date['Name']?>" id="name">
      </div>
      <div class="mb-3 col-md-6">
        <label for="Prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?=$date['Prenom']?>" id="prenom">
      </div>
      <div class="mb-3 col-md-6">
        <label class="form-label" for="Tele">Telephone</label>
        <div class="input-group input-group-merge">
          <span class="input-group-text">US (+1)</span>
          <input type="text" name="telephone" class="form-control" id="telephone" value="<?= $date['Telephone'] ?>">
        </div>
      </div>

      <div class="mb-3 col-md-6">
        <label for="Email" class="form-label">E-mail</label>
        <input type="text" name="email" class="form-control" id="email" value="<?= $date['Email'] ?>">
      </div>

      <div class="mb-3 col-md-6">
        <label for="Date_D" class="form-label">Date Debut</label>
        <input type="date" class="form-control" name="Date_D" value="<?= date('Y-m-d') ?>" id="Date_D">
      </div>


      <div class="mb-3 col-md-6">
        <label for="Password" class="form-label">Password</label>
        <input type="text" name="password" class="form-control" id="password" value="<?= $date['Password'] ?>">
      </div>

      <!-- Additional fields from the employer table -->
      <div class="form-group col-md-6">
        <label for="Profe">Profession</label>
        <input type="text" name="profession" class="form-control" id="profession" value="<?= $date['Profession'] ?>">
      </div>

      <div class="mb-3 col-md-6">
        <label for="date_update" class="form-label">date_update</label>
        <input type="date" class="form-control" name="date_update" value="<?= date('Y-m-d') ?>" id="date_update">
      </div>

      <div class="mb-3 col-md-6">
        <label for="date_creation" class="form-label">date_creation</label>
        <input type="date" class="form-control" name="date_creation" value="<?= date('Y-m-d') ?>" id="date_creation">
      </div>
      <div class="mb-3 col-md-6">
        <label for="role" class="form-label">role</label>
        <input type="text" name="role" class="form-control" id="role" value="<?= $date['Role'] ?>">
      </div>

      </div>
      <!-- Add a submit button -->
      <div class="form-group col-12">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>