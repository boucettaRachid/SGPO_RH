<?php
    require_once("D:\wamp64\www\SGPO_RH\controle\Stagiaire\StagiaireController.php");
    $obj = new StagiaireController();
    $obj->deleteDOC($_GET['id']);
    
?>
  <div class="container text-center mt-5">
        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    