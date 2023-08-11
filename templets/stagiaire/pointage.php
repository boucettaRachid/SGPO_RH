<?php
// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gestion_pointage_stagiaire';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get the QR code data from the POST request
$qrCodeMessage = $_POST['qrCodeMessage'];

// Validate the QR code data and extract the necessary values
$dateTime = date('Y-m-d H:i:s', strtotime($qrCodeMessage));
$date = date('Y-m-d', strtotime($qrCodeMessage));

// Get the stagiaire ID from the URL
$stagiaireId = $_GET['id']; // Assuming the ID is passed as a query parameter in the URL

// Check if the user has already made two scans for the current date
$scanLimit = 1;
$sql = 'SELECT COUNT(*) AS scanCount FROM pointage WHERE DATE(`Date-S`) = ? AND  ID_stagiaire = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $date, $stagiaireId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$scanCount = $row['scanCount'];

if ($scanCount >= $scanLimit) {
    $stmt->close();
    $conn->close();
    header('Location: echec.html');
        exit;

}

// Check if an entry exists for the current date and stagiaire ID without a leaving time
$sql = 'SELECT * FROM pointage WHERE DATE(`Date-E`) = ? AND  ID_stagiaire = ? AND `Date-S` IS NULL';
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $date, $stagiaireId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowId = $row['ID_pointage'];

    // Update the existing entry with the leaving time
    $updateSql = 'UPDATE pointage SET `Date-S` = ? WHERE ID_pointage = ? AND `Date-E` IS NOT NULL AND `Date-S` IS NULL';
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param('si', $dateTime, $rowId);

    if ($updateStmt->execute()) {
        header('Location: confirmation.html');
        exit;

    } else {
        echo "Erreur lors de l'insertion des données du code QR pour la sortie. " . $updateStmt->error;
    }

    $updateStmt->close();
} else {
    // No entry exists, insert a new row with the `Date-E` value and  ID_stagiaire
    $insertSql = 'INSERT INTO pointage (`Date-E`,  ID_stagiaire) VALUES (?, ?)';
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param('si', $dateTime, $stagiaireId);

    if ($insertStmt->execute()) {
        header('Location: confirmation.html');
        exit; 
       } else {
        echo "Erreur lors de l'insertion des données du code QR pour l'entrée. " . $insertStmt->error;

    }

    $insertStmt->close();
}

$stmt->close();
$conn->close();
?>
