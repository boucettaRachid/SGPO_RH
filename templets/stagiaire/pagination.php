    <?php 

   // connecting to the database.
   $mysqli = new mysqli('localhost', 'root', '','gestion_pointage_stagiaire');
   if($mysqli->connect_errno != 0){
      echo $mysqli->connect_error;
      exit();
   }else{
      $mysqli->set_charset("utf8mb4");	
   }
   $records = $mysqli->query("select * from document");
   $nr_of_rows = $records->num_rows;
   
   // Setting the number of rows to display in a page.
   $rows_per_page = 4;
 
   // calculating the nr of pages.
   $pages = ceil($nr_of_rows / $rows_per_page);
 
   // Setting the start from, value.
   $start = 0;
   if(isset($_GET['page-nr'])){
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
 }

 // Query the database based on the calculated $start value, 
 // and the fixed $rows_per_page value.
 $result = $mysqli->query("SELECT * FROM document LIMIT $start, $rows_per_page");
 ?>
 <html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    
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

   <title>php and mysql pagination</title>
</head>
<body>
   <style>
      	a.active{
   background-color: #0d81cd;
   color: #fff;
   *{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-size: 20px;
}
 
body{
   font-family: sans-serif;
   min-height: 100vh;
   color: #555;
   padding: 30px;
}
 
a{
   display: inline-block;
   text-decoration: none;
   color: #006cb3;
   padding: 10px 20px;
   border: thin solid #d4d4d4;
   transition: all 0.3s;
   font-size: 18px;
}
 
a.active{
   background-color: #0d81cd;
   color: #fff;
}
.page-info{
   margin-top: 90px;
   font-size: 18px;
   font-weight: bold;
}
 
.pagination{
   margin-top: 20px;
}
.content p{
   margin-bottom: 15px;
}
.page-numbers{
   display: inline-block;
}
}
   </style>
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
  <?php if($result): ?>
  <?php foreach($result as $row): ?>
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
<div class="text-center">
<nav aria-label="Page navigation example">
    <ul class="pagination" style="justify-content: center;">
        <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1): ?>
            <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        <?php endif; ?>

        <?php for ($num = 1; $num <= $pages; $num++): ?>
            <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] == $num): ?>
                <li class="page-item active"><span class="page-link"><?php echo $num ?></span></li>
            <?php else: ?>
                <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pages): ?>
            <li class="page-item"><a class="page-link" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a></li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        <?php endif; ?>
    </ul>
</nav>
</div>
</body>
</html>	