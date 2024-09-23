<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

// Obtenir les données JSON envoyées
$data = json_decode(file_get_contents('php://input'), true);

// Obtenir l'ID du consultant
$id = $data['id'];

// Requête pour supprimer le consultant
$sql = "DELETE FROM consultants WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Consultant supprimé avec succès.";
} else {
    echo "Erreur lors de la suppression du consultant: " . $conn->error;
}

$conn->close();
?>
