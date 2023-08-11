<?php
require_once '../../setting/db.php';

class StagiaireModel
{
    private $PDO;

    public function __construct()
    {
        $db = new db(); // Create an instance of the db class
        $this->PDO = $db->conexion(); // Use the conexion() method to establish the database connection
    }

    public function getStagiaire($ID_stagiaire)
    {
        $statement = $this->PDO->prepare("SELECT s.*, d.Name_Dep as Department_Name FROM stagiaire s LEFT JOIN departements d ON s.ID_dep = d.ID_dep WHERE ID_stagiaire = :ID_stagiaire LIMIT 1");
        $statement->bindParam(":ID_stagiaire", $ID_stagiaire, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function getAllStagiaire()
    {
        $statement = $this->PDO->prepare("SELECT s.*, d.Name_Dep as Department_Name FROM stagiaire s LEFT JOIN departements d ON s.ID_dep = d.ID_dep");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
   /*function updateS($ID_stagiaire, $username, $password ) {
        $statement = $this->PDO->prepare("UPDATE stagiaire SET Username = :username, Password = :password,WHERE ID_stagiaire = :ID_stagiaire");
      
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        
       
        return ($statement->execute()) ? $ID_stagiaire : false;
    }*/
    public function updateS($id, $username, $password) {
        // Update a "stagiaire" record in the database
        try {
            $stmt = $this->PDO->prepare("UPDATE stagiaire SET Username = :username, Password = :password WHERE ID_stagiaire= :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Handle database errors here
            return false; // Return false if the update fails
        }
    }
    public function insertDoc($nameDoc, $date_cration, $DOC,$id_stag) {
        $statement = $this->PDO->prepare("INSERT INTO document (Name_Doc, Date_cration, Type_Doc,ID_stagiaire) VALUES (:name, :date_creation, :Type_Doc,:id_satagiare)");
        $statement->bindParam(":name", $nameDoc);
        $statement->bindParam(":date_creation", $date_cration);
        $statement->bindParam(":Type_Doc", $DOC);
        $statement->bindParam(":id_satagiare", $id_stag);
       
        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function getAllDocument($id_Stagiaire) {
        $documents = array();
        $query = "SELECT * FROM document WHERE ID_stagiaire = :id";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(":id", $id_Stagiaire,PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $documents[] = $row;
        }
    
        return $documents;
    }
    public function getAllDocumentt($id_Stagiaire) {
        
        $query = "SELECT * FROM document WHERE ID_stagiaire = :id";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(":id", $id_Stagiaire,PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt;
    }
    public function deleteDoc($ID_DOC) {
        $statement = $this->PDO->prepare("DELETE FROM document WHERE ID_document  = :ID_DOC");
        $statement->bindParam(":ID_DOC", $ID_DOC);
        return ($statement->execute()) ? true : false;
    }
    public function pagination($id_Stagiaire,$start, $rows_per_page) {
        $query = "SELECT * FROM document WHERE ID_stagiaire = :id limit $start, $rows_per_page";
        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(":id", $id_Stagiaire,PDO::PARAM_INT);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $documents[] = $row;
        }
    
        return $documents;
    }
    
    //for scan
    /*
    public function getEntryRowId($date, $stagiaireId) {
        $stmt = $this->PDO->prepare("SELECT Id FROM pointage WHERE DATE(`Date-E`) =:dateE AND `Date-S` IS NULL");
        $stmt->bindParam(":dateE",$date);
        $stmt->bindParam(":id",$stagiaireId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Id'];
        } else {
            return false;
        }

        $stmt->close();
    }
    

    public function checkScanLimit($date, $stagiaireId, $scanLimit) {
        $stmt = $this->PDO->prepare("SELECT COUNT(*) AS scanCount FROM pointage WHERE DATE(`Date-S`) = ? AND stagiaire_id = ?");
        $stmt->bind_param('si', $date, $stagiaireId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $scanCount = $row['scanCount'];
        $stmt->close();

        return ($scanCount >= $scanLimit);
    }

    public function checkEntryExists($date, $stagiaireId) {
        $stmt = $this->PDO->prepare("SELECT * FROM pointage WHERE DATE(`Date-E`) = ? AND stagiaire_id = ? AND `Date-S` IS NULL");
        $stmt->bind_param('si', $date, $stagiaireId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }

    public function updateEntry($dateTime, $rowId) {
        $stmt = $this->PDO->prepare("UPDATE pointage SET `Date-S` = ? WHERE Id = ? AND `Date-E` IS NOT NULL AND `Date-S` IS NULL");
        $stmt->bind_param('si', $dateTime, $rowId);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    public function insertNewEntry($dateTime, $stagiaireId) {
        $stmt = $this->PDO->prepare("INSERT INTO pointage (`Date-E`, stagiaire_id) VALUES (?, ?)");
        $stmt->bind_param('si', $dateTime, $stagiaireId);
        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }
*/
}  
?>
