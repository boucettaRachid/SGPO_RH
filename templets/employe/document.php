<?php

include 'header.php';
require_once("../../controle/Employe/DocumentController.php");
$obj = new  DocumentController();
$stag = $obj->getStagiaireInfo($_GET['id']);
$doc = $obj->getDocumentHistory($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SGPO</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

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

<!-- Rest of your HTML content goes here -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <h5> document de : <?=$stag['Name']?> <?=$stag['Prenom']?></h5>
                <?php if (empty($doc)): ?>
                    <p>Aucun document disponible pour ce stagiaire.</p>
                <?php else: ?>
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <div class="export-button mb-2">
                            
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Name Document</th>
                                    <th scope="col">Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doc as $docs): ?>
                                    <tr>
                                        <td><?=$docs['Name']?></td>
                                        <td><?=$docs['Prenom']?></td>
                                        <td><?=$docs['Name_Doc']?></td>
                                        <td class="align-middle">
                                            <?php if (!empty($docs['Type_Doc'])): ?>
                                                <a href="../../templets/admin/cvs/<?php echo $docs['Type_Doc']; ?>" target="_blank"><i class="fas fa-file"></i></a>
                                        <?php else: ?>
                                         No CV
                                  <?php endif; ?>
                                           </td>
                                      
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
