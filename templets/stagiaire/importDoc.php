<?php
/*
ob_start();  Mettre en tampon la sortie.
require_once("D:\wamp64\www\SGPO_RH\controle\Stagiaire\StagiaireController.php");
$obj = new StagiaireController();
if ( isset($_POST['nomDoc']) && isset($_POST['Doc'])) {
    $nameDoc = $_POST['nomDoc'];
    $date_creation =$_POST['date_creation'];
    $Doc =$_POST['Doc'];
$obj->guardarr($nameDoc, $date_creation, $Doc);
echo"bravo";
}
ob_end_flush(); // Afficher la sortie mise en tampon.
*/ 

?>
<?php
ob_start(); 
require_once("D:\wamp64\www\SGPO_RH\controle\Stagiaire\StagiaireController.php");
$obj = new StagiaireController();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nomDoc']) && isset($_FILES['Doc']) && isset($_POST['id_Stagiaire'])) {
    $nameDoc = $_POST['nomDoc'];
    $date_creation = $_POST['date_creation'];
    $Doc = $_FILES['Doc']; // Use $_FILES instead of $_POST for file upload
    $id_stag = $_POST['id_Stagiaire']; // Corrected variable name
    $obj->guardarr($nameDoc, $date_creation, $Doc, $id_stag);
    echo "bravo";
}

ob_end_flush(); // Flush the buffered output and display it.
?>
