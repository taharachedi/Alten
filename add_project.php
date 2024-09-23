<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion']);
    exit;
}

$titre = $_POST['titre'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$consultants = $_POST['consultants'];
$description = $_POST['description'];

$sql = "INSERT INTO projets (titre, date_debut, date_fin, consultants, description) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $titre, $date_debut, $date_fin, $consultants, $description);

if ($stmt->execute()) {
    $id = $stmt->insert_id;
    echo json_encode(['success' => true, 'id' => $id, 'titre' => $titre, 'date_debut' => $date_debut, 'date_fin' => $date_fin, 'consultants' => $consultants, 'description' => $description]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$stmt->close();
$conn->close();
?>
