<?php
require_once("../../setting/db.php");
require_once('../../TCPDF/tcpdf.php');

$con = new db();
$pdo = $con->conexion();

// Check the export type (PDF or Excel)
$type = isset($_GET['type']) ? $_GET['type'] : 'pdf';
// Start output buffering
ob_start();
// Fetch data based on the table name
$tableName = isset($_GET['table']) ? $_GET['table'] : '';

if ($tableName === 'stagiaire') {
    // Fetch stagiaire data
    $stmt = $pdo->prepare('SELECT stagiaire.* FROM stagiaire;');
    $stmt->execute();
    $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    generateTablePDF($tableData, 'Liste des Stagiaires', 'stagiaire');
} elseif ($tableName === 'pointage') {
    // Fetch pointage data
    $stmt = $pdo->prepare("SELECT `stagiaire`.`Name`, `stagiaire`.`Prenom`, `pointage`.`Date-E`, `pointage`.`Date-S` 
        FROM `stagiaire` 
        JOIN `pointage` ON `stagiaire`.`ID_stagiaire` = `pointage`.`ID_stagiaire` 
        WHERE `stagiaire`.`ID_stagiaire` = :id
        ORDER BY `pointage`.`Date-S` DESC");
    $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    generateTablePDF($tableData, 'Pointage', 'pointage');
} elseif ($tableName === 'employer') {
    // Fetch employer data
    $stmt = $pdo->prepare('SELECT employer.* FROM employer;');
    $stmt->execute();
    $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    generateTablePDF($tableData, 'Liste des Employeurs', 'employer');
} else {
    // Handle unknown table name
}

// Clean and send the buffered output
ob_end_clean();

function generateTablePDF($tableData, $filename, $tableName) {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle($filename);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();

    // Generate PDF based on table name
    switch ($tableName) {
        case 'stagiaire':
            generateStagiaireTablePDF($pdf, $tableData);
            break;
        case 'pointage':
            generatePointageTablePDF($pdf, $tableData);
            break;
        case 'employer':
            generateEmployerTablePDF($pdf, $tableData);
            break;
        default:
            // Handle unknown table name
            break;
    }

    $pdf->Output($filename . '.pdf', 'D');
    exit();
}

function generateStagiaireTablePDF($pdf, $tableData) {
    $html = '<h2>Liste des Stagiaires</h2><table><thead><tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th></tr></thead>';

    foreach ($tableData as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['Name'] . '</td>';
        $html .= '<td>' . $row['Prenom'] . '</td>';
        $html .= '<td>' . $row['Email'] . '</td>';
        $html .= '<td>' . $row['Tele'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');
}

function generatePointageTablePDF($pdf, $tableData) {
    $html = '<h2>Pointage</h2><table><thead><tr><th>Nom</th><th>Prénom</th><th>Date-D</th><th>Date-F</th></tr></thead>';

    foreach ($tableData as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['Name'] . '</td>';
        $html .= '<td>' . $row['Prenom'] . '</td>';
        $html .= '<td>' . $row['Date-E'] . '</td>';
        $html .= '<td>' . $row['Date-S'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');
}

function generateEmployerTablePDF($pdf, $tableData) {
    $html = '<h2>Liste des Employeurs</h2><table><thead><tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th></tr></thead>';

    foreach ($tableData as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['Name'] . '</td>';
        $html .= '<td>' . $row['Prenom'] . '</td>';
        $html .= '<td>' . $row['Email'] . '</td>';
        $html .= '<td>' . $row['Telephone'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');
}
?>
