
<?php

include 'header.php';
 require_once ("../../controle/admin/StagiaireController.php");

 $obj = new StagiaireController();
 $rows = $obj->getAllStagiaire();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
  </head>
  <body>
 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
            <button style="border:none; background-color:#f8f8fd;"><a href="export.php?type=pdf&table=stagiaire" class="export-link">PDF<i class="fa-solid fa-download"></i></a></button>
            <button onclick="exportToExcel()" style="border:none; background-color:#f8f8fd;"><a class="export-link">Excel <i class="fa-solid fa-download"></i></a></button>
        </div>
                  <table class="table">
                    <thead>
                      <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                   
                    <th><?= $row[1] ?></th>
                    <th><?= $row[2] ?></th>
                    <th><?= $row[3] ?></th>
                    <th><?= $row[4] ?></th>
                    <th><?= $row[5] ?></th>
                    <td class="align-middle">
                    <?php if (!empty($row[19])): ?>
                    <img src="images/<?php echo $row[19]; ?>" alt="<?php echo $row[1]; ?>" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" class="contact-image">
                    <?php else: ?>
                    No Image
                    <?php endif; ?>
                </td>
                <td class="align-middle">
                    <?php if (!empty($row[8])): ?>
                    <a href="cvs/<?php echo $row[8]; ?>" target="_blank"><i class="fas fa-file"></i></a>
                    <?php else: ?>
                    No CV
                    <?php endif; ?>
                </td>
                    <th>
                    <button type="button" class="btn btn-primary align-middle"><a href="pointage-stagiaire.php?id=<?= $row[0]?>" class=""><i class=" fa-solid fa-user" style="color: #ffffff;"></i></a></button>
                        <button type="button" class="btn btn-warning mr-2 align-middle"><a href="editStagiaire.php?id=<?= $row[0]?>"><i class="fas fa-pen fa-xs" style="color: #ffffff;"></i></a></button>
                        <button type="button" class="btn btn-danger mr-2 align-middle"><a  data-bs-toggle="modal" data-bs-target="#id<?=$row[0]?>" class="trash"><i class="fas fa-trash fa-xs" style="color: #ffffff;"></i></a></button>
                        <!-- Modal -->
                        <div class="modal fade" id="id<?=$row[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Una vez eliminado no se podra recuperar el registro
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="deletStagiaire.php?id=<?= $row[0]?>" class="btn btn-danger">Eliminar</a>
                                    <!-- <button type="button" >Eliminar</button> -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<script>
        function exportToExcel() {
            // Créer le fichier Excel
            var workbook = XLSX.utils.book_new();

            // Convertir les données en un tableau compatible avec SheetJS
            var dataArray = <?php echo json_encode($rows); ?>;
            var sheetData = dataArray.map(function (item) {
                return [
                    item[1], item[2], item[3], item[4], item[5], item[6], item[7], item[8], item[9]
                ];
            });

            // Créer une feuille de calcul
            var worksheet = XLSX.utils.aoa_to_sheet([
                ["Nom", "Prénom", "Email", "Date D", "Date F", "Adresse", "Téléphone", "Fonction", "Acciones"],
                ...sheetData
            ]);

            // Ajouter la feuille de calcul au classeur
            XLSX.utils.book_append_sheet(workbook, worksheet, "Liste des Stagiaires");

            // Convertir le classeur en un fichier Excel binaire
            var excelData = XLSX.write(workbook, { bookType: "xlsx", type: "array" });

            // Créer un objet Blob à partir des données Excel
            var blob = new Blob([excelData], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });

            // Créer un URL object à partir du blob
            var url = URL.createObjectURL(blob);

            // Créer un lien de téléchargement et cliquer dessus pour télécharger le fichier Excel
            var link = document.createElement("a");
            link.href = url;
            link.download = "Liste_des_stagiaires.xlsx";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

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