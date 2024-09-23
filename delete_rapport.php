<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

// Vérifier si un ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM rapports WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Rapport supprimé avec succès"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur : " . $conn->error]);
    }
}

$conn->close();
?>
