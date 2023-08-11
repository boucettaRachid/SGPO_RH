<?php

include 'header.php';
require_once("../../controle/admin/PointageController.php");
$obj = new PointageController();
$stag = $obj->getStagiaireInfo($_GET['id']);
$poin = $obj->getPointageHistory($_GET['id']);
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
                <h5>Historique de pointage pour: <?=$stag['Name']?> <?=$stag['Prenom']?></h5>
                <?php if (empty($poin)): ?>
                    <p>Aucun pointage disponible pour ce stagiaire.</p>
                <?php else: ?>
                    <div class="row align-items-center mb-3">
                        <div class="col">
                            <div class="export-button mb-2">
                            <button style="border:none; background-color:#f8f8fd;"><a href="export.php?type=pdf&table=stagiaire" class="export-link">PDF<i class="fa-solid fa-download"></i></a></button>
                                <button onclick="exportToExcel()" style="border:none; background-color:#f8f8fd;" class="export-link">
                                    <a  class="export-link">Excel <i class="fa-solid fa-download"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Date Début</th>
                                    <th scope="col">Date Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($poin as $pointage): ?>
                                    <tr>
                                        <td><?=$pointage['Name']?></td>
                                        <td><?=$pointage['Prenom']?></td>
                                        <td><?=$pointage['Date-E']?></td>
                                        <td><?=$pointage['Date-S']?></td>
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
<script>
    function exportToExcel() {
        var table = document.getElementById("dataTable");
        var rows = table.getElementsByTagName("tr");
        var data = [];
        
        for (var i = 0; i < rows.length; i++) {
            var rowData = [];
            var cells = rows[i].getElementsByTagName("td");
            
            for (var j = 0; j < cells.length; j++) {
                rowData.push(cells[j].textContent);
            }
            
            data.push(rowData);
        }

        var worksheet = XLSX.utils.aoa_to_sheet([
            ["Nom", "Prénom", "Date Début", "Date Fin"],
            ...data
        ]);

        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Historique de pointage");

        var excelData = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

        var blob = new Blob([excelData], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });

        var url = URL.createObjectURL(blob);

        var link = document.createElement("a");
        link.href = url;
        link.download = "Historique_de_pointage_" + "<?=$stag['Name']?>_<?=$stag['Prenom']?>.xlsx";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<!-- Build your JavaScript imports and scripts here -->

</body>
</html>
