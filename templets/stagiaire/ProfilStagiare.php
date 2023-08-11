<?php
//session_start();
include 'header.php'; 
/*require_once("D:\wamp64\www\SGPO_RH\controle\Stagiaire\StagiaireController.php");

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $obj = new StagiaireController();
    $stagiaireData = $obj->show($id);

    if ($stagiaireData) {
        // The stagiaire data is found, now we can use it to populate the form
        // ...
        */?>
      
        <!DOCTYPE html>
        <html lang="en">


        <head>
            <meta charset="utf-8" />
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

            <title>SGPO</title>

            <meta name="description" content="" />

            <!-- Favicon -->
            <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
                rel="stylesheet" />

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
            <!-- Core JS and other HTML code -->
            <!-- Core JS -->
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

            <!-- Form to display data -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <h5 class="card-header">Profile Details</h5>
                        <div class="container">
                                <div class="form-group d-flex align-items-center">
                                    <img src="images/<?php echo $stagiaireData['Image']; ?>" class="w-px-160 h-auto rounded-circle" width="150px" height="150px" style="margin: 30px;">
                                    <div>
                                        <h5 style="margin-top: 5px;margin-bottom: 10px;"><?php echo ucfirst($stagiaireData['Name']); ?></h5>
                                        <h5 style="margin-top: 5px;margin-bottom: 10px;"><?php echo ucfirst($stagiaireData['Prenom']); ?></h5>
                                        <h5 style="margin-top: 5px; margin-bottom: 10px;"><?php echo ucfirst($stagiaireData['Mission']); ?></h5>
                                    </div>
                                </div>
                            </div>


                       
                        
                        <hr class="my-0" />
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                <div class="row">

                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <!-- ... -->
                                                <div class="mb-3 col-md-6">
                                                    <label for="Name" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="Name" name="Name"
                                                        value="<?php echo $stagiaireData['Name']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Prenom" class="form-label">Prenom</label>
                                                    <input type="text" class="form-control" id="Prenom" name="Prenom"
                                                        value="<?php echo $stagiaireData['Prenom']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="Tele">Telephone</label>
                                                    <input type="text" class="form-control" id="Tele" name="Tele"
                                                        value="<?php echo $stagiaireData['Tele']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="<?php echo $stagiaireData['Email']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Adresse</label>
                                                    <input type="text" class="form-control" id="adresse" name="adresse"
                                                        value="<?php echo $stagiaireData['Address']; ?>" readonly>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="" class="form-label">CIN:</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $stagiaireData['Cin']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="" class="form-label">Mission</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $stagiaireData['Mission']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="" class="form-label">Type_stage</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $stagiaireData['Type_stage']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="" class="form-label">Date_debut</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $stagiaireData['Date_D']; ?>" readonly>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="" class="form-label">Date_Fin</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $stagiaireData['Date_F']; ?>" readonly>
                                                </div>
                                                <!-- ... More fields ... -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              
                            </form>
                              <!-- ... Modifie mon compte ... -->
                            <h5 class="card-header">Modifie mon compte</h5>
                            <hr class="my-0" />
                            <div class="row">
                                <div class="card-body">
                                    <form action="../../controle/Stagiaire/updateS.php" method="post">
                                     <section>  
                                     <div class="row">
                                  
                                            <div class="mb-3 col-md-6">
                                                <label for="Name" class="form-label">username</label>
                                                <input type="text" class="form-control" id="Name" name="username"
                                                    value="<?php echo $stagiaireData['Username']; ?>" >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="" class="form-label">motpasse</label>
                                                <input type="text" class="form-control" name="password"
                                                    value="<?php echo $stagiaireData['Password']; ?>" >
                                            </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                    
                                                    <input type="hidden" class="form-control" name="id"
                                                        value="<?php echo $stagiaireData['ID_stagiaire']; ?>" readonly>
                                                </div>
                                                <div class="form-group col-12">
                                                  <button type="submit" class="btn btn-primary" name="edit">modifier</button>
                                                 </div> 
                                     </section>    
                                        
                                </div>
                            </div>
                        </form>     
                        </div>
                    </div>
                </div>

            </div>
            

        </body>

        </html>

        <?php
  /*  } else {
        echo "Stagiaire not found!";
    }
} else {
    echo "Stagiaire ID not provided!";
}*/
?>