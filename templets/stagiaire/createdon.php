<?php
//session_start();
include 'header.php';

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
<div class="content-wrapper">
<form action="importDoc.php" method="post" enctype="multipart/form-data">
        <div class="container ">
            <div class="form-group">
            <h1 class="mb-0 pb-2 border-bottom" style="margin: 10 px; margin-top: 15px;"><i>Deposer </i></h1>
                <input type="hidden" class="form-control" name="id_Stagiaire" id="id_Stagiaire" value="<?php echo $stagiaireData['ID_stagiaire']; ?>" readonly >
            </div>
            <div class="form-group">
                <label for="nomDoc">nom_document:</label>
                <input type="text" class="form-control" name="nomDoc" id="nomDoc" >
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="date_creation" id="date_creation" value="<?= date('Y-m-d') ?>">
            </div>  
            <div class="form-group">
                <label for="doc">Document:</label>
                <input type="file" class="form-control" name="Doc" id="doc">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<div class="content-wrapper">
<?php

    require_once("../../controle/Stagiaire/StagiaireController.php");
    $obj = new StagiaireController();

    $rows = $obj->getAllDocument($id);
?>
<div class="container">
<table class="table table-sm "  >
  <thead >
    <tr >
      <th scope="col"></th>
      <th scope="col" class="fs-5" >nom fichier</th>
      <th scope="col" class="fs-5" >date creation</th>
      <th scope="col" class="fs-5" ></th>
    </tr>
  </thead>
  <tbody>
  <?php if($rows): ?>
  <?php foreach($rows as $row): ?>
    <tr>
      <th scope="row"></th>
      <td> <?= $row['Name_Doc']?> </td>
      <td><?= $row['Date_cration']?> </td>
      <td><a href="<?php echo $row['Type_Doc']; ?>" /> <button type="submit" class="btn btn-primary">telecharger</button> </a> <a href="suppDoc.php?id=<?php echo $row['ID_document']; ?>"> <button class="btn btn-danger" >Supprimer</button></a></td>
    </tr>
    <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
   
  </tbody>
</table>
</div>
</div>
   
</body>
</html>

</body>
</html>