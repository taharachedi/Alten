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

$id = $_POST['id'];
$titre = $_POST['titre'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$consultants = $_POST['consultants'];
$description = $_POST['description'];

$sql = "UPDATE projets SET titre=?, date_debut=?, date_fin=?, consultants=?, description=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $titre, $date_debut, $date_fin, $consultants, $description, $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'id' => $id, 'titre' => $titre, 'date_debut' => $date_debut, 'date_fin' => $date_fin, 'consultants' => $consultants, 'description' => $description]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$stmt->close();
$conn->close();
?>
