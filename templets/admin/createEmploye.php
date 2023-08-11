<?php

include 'header.php';
require_once("../../controle/admin/EmployeController.php");
$obj = new EmployerController();
$departments = $obj->getAllDepartements();
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


  <form action="store3.php" method="POST" autocomplete="off">
  <div class="content-wrapper">
              <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
               <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>

                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
             
                        <div class="card-body">
  <form id="formAccountSettings" method="POST" onsubmit="return false">
    <div class="row">
      <!-- ... -->
<div class="mb-3 col-md-6">
  <label for="name" class="form-label">Nom</label>
  <input type="text" class="form-control" name="name" id="name">
</div>
<div class="mb-3 col-md-6">
  <label for="Prenom" class="form-label">Prenom</label>
  <input type="text" class="form-control" name="prenom" id="prenom">
</div>
<div class="mb-3 col-md-6">
  <label class="form-label" for="Tele">Telephone</label>
  <div class="input-group input-group-merge">
    <span class="input-group-text">US (+1)</span>
    <input type="text" class="form-control" name="telephone" id="telephone">
  </div>
</div>
<div class="mb-3 col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3 col-md-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username">
      </div>
<!-- ... -->
<div class="mb-3 col-md-6">
  <label for="cin" class="form-label">CIN</label>
  <input type="text" class="form-control" name="cin" id="cin">
</div>
<div class="mb-3 col-md-6">
  <label for="address" class="form-label">Address</label>
  <input type="text" class="form-control" name="address" id="address">
</div>

<div class="mb-3 col-md-6">
  <label for="salaire" class="form-label">Salaire</label>
  <input type="text" class="form-control" name="salaire" id="salaire">
</div>
<!-- Add more fields as needed -->


      <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="Password" class="form-control" name="password" id="password">
      </div>

<div class="mb-3 col-md-6">
  <label for="type_contrat" class="form-label">Type de contrat</label>
  <input type="text" class="form-control" name="type_contrat" id="type_contrat">
</div>

<div class="mb-3 col-md-6">
  <label for="profe" class="form-label">profe</label>
  <input type="text" class="form-control" name="profe" id="profe">
</div>

      <div class="mb-3 col-md-6">
        <label for="Date_D" class="form-label">date_creation</label>
        <input type="date" class="form-control" name="Date_D" value="<?= date('Y-m-d') ?>" id="Date_D">
      </div>
      <div class="mb-3 col-md-6">
        <label for="date_creation" class="form-label">Date creation</label>
        <input type="date" class="form-control" name="date_creation" value="<?= date('Y-m-d') ?>" id="date_creation">
      </div>


<!-- Add more fields as needed -->
<div class="form-group col-md-6">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image">
      </div>

      <div class="form-group col-md-6">
        <label for="cv">CV</label>
        <input type="file" class="form-control" name="cv" id="cv">
      </div>
      
      <div class="mb-3 col-md-6">
    <label for="ID_dep" class="form-label">Département</label>
    <select class="form-control" name="ID_dep" id="ID_dep">
        <!-- Populate the options based on your departments data -->
        <?php
        foreach ($departments as $department) {
            echo '<option value="' . $department['ID_dep'] . '">' . $department['Name_Dep'] . '</option>';
        }
        ?>
    </select>
</div>


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