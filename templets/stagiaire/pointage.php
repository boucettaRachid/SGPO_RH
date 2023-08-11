<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gestion_pointage_stagiaire';

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the QR code data from the POST request
    $qrCodeMessage = $_POST['qrCodeMessage'];

    // Validate the QR code data and extract the necessary values
    $dateTime = date('Y-m-d H:i:s', strtotime($qrCodeMessage));
    $date = date('Y-m-d', strtotime($qrCodeMessage));

    // Get the stagiaire ID from the URL
    $stagiaireId = $_GET['id']; // Assuming the ID is passed as a query parameter in the URL

    // Check if an entry exists for the current date and stagiaire ID without a leaving time
    $checkEntryStmt = $conn->prepare('SELECT ID_pointage FROM pointage WHERE DATE(`Date-E`) = ? AND ID_stagiaire = ? AND `Date-S` IS NULL');
    $checkEntryStmt->execute([$date, $stagiaireId]);
    $existingEntry = $checkEntryStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingEntry) {
        // Update the existing entry with the leaving time
        $updateEntryStmt = $conn->prepare('UPDATE pointage SET `Date-S` = ? WHERE ID_pointage  = ? AND `Date-E` IS NOT NULL AND `Date-S` IS NULL');
        $updateEntryStmt->execute([$dateTime, $existingEntry['ID_pointage ']]);        
        header('Location: confirmation.html');
        exit;
    } else {
        // No entry exists, insert a new row with the entry time and stagiaire ID
        $insertEntryStmt = $conn->prepare('INSERT INTO pointage (`Date-E`, ID_stagiaire) VALUES (?, ?)');
        $insertEntryStmt->execute([$dateTime, $stagiaireId]);
        header('Location: confirmation.html');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
<!-- Your HTML and JavaScript code here -->
