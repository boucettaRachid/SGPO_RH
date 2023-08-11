<?php




class StagiaireController
{
    private $model;

    public function __construct()
    {
        require_once("D:\wamp64\www\SGPO_RH\Model\Stagiaire\stagiaireModel.php");
        $this->model = new StagiaireModel();
    }

    public function show($id)
    {
        return ($this->model->getStagiaire($id) != false) ? $this->model->getStagiaire($id) : header("Location: ../../templets/stagiaire/update.php?id=$id");
    }

    public function getAllStagiaire()
    {
        return ($this->model->getAllStagiaire()) ? $this->model->getAllStagiaire() : false;
    }
   
      
    public function updateS($id, $username, $password) {
        // Call the model's updateS method to perform the update operation
       
        $result = $this->model->updateS($id, $username, $password);

        // Redirect the user to the appropriate page based on the update result
        if ($result) {
            header("Location: ../../templets/stagiaire/ProfilStagiare.php?id=$id");
        } else {
            // Handle the case where the update operation failed
            // You can add an error message or take other actions as needed.
        }
    }



    
    public function guardarr($nameDoc, $date_creation, $DOC,$id_stag) {
        // Handle CV upload
        $cv_path = 'cvs/' . $_FILES['Doc']['name'];
        move_uploaded_file($_FILES['Doc']['tmp_name'], $cv_path);

        $id = $this->model->insertDoc($nameDoc, $date_creation, $cv_path,$id_stag);

        if ($id !== false) {
            header("Location: ../../templets/stagiaire/createdon.php?id=$id_stag");
        } else {
            header("Location: ../../templets/stagiaire/createdon.php");
        }
    }
    
    /*public function getAllDocument($idDOC){
        return ($this->model->getAllDocument($idDOC)) ? $this->model->getAllDocument($idDOC) : false;
    }*/
    public function getAllDocument($id) {
        $documents = $this->model->getAllDocument($id);
        return $documents ? $documents : false;
    }
    public function getAllDocumentt($id) {
        $documents = $this->model->getAllDocumentt($id);
        return $documents ? $documents : false;
    }
    
    
    public function pagination($id,$start,$rows_per_page) {
        $documents = $this->model->pagination($id,$start,$rows_per_page);
        return $documents ? $documents : false;
    }
    
    //////////////////
    /*public function processQRCode($date, $stagiaireId, $scanLimit) {
        $dateTime = date('Y-m-d H:i:s', strtotime($date));
    
        // Check if the scan limit has been reached
        if ($this->model->checkScanLimit($date, $stagiaireId, $scanLimit)) {
            header('Location: echec.html');
            exit;
        }
    
        // Check if an entry exists without an exit time
        if ($this->model->checkEntryExists($date, $stagiaireId)) {
            // Get the row ID for the existing entry
            $rowId = $this->model->getEntryRowId($date, $stagiaireId);
    
            if ($rowId !== false) {
                // Update the existing entry with the exit time
                $result = $this->model->updateEntry($dateTime, $rowId);
    
                if ($result) {
                    header('Location: confirmation.html');
                    exit;
                } else {
                    echo "Erreur lors de la mise à jour des données du code QR.";
                }
            } else {
                echo "Erreur: L'ID de ligne pour la mise à jour n'a pas pu être récupéré.";
            }
        } else {
            // Insert a new entry with the entry time
            $result = $this->model->insertNewEntry($dateTime, $stagiaireId);
    
            if ($result) {
                header('Location: confirmation.html');
                exit;
            } else {
                echo "Erreur lors de l'insertion des données du code QR.";
            }
        }
    }*/
    public function deleteDOC($id){
        return ($this->model->deleteDoc($id)) ? :  header("Location:listAdmin.php")  ;
    }
}
?>
