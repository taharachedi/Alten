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

// Vérifier si la requête est une POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $type_rapport = $conn->real_escape_string($_POST['type_rapport']);
    $description = $conn->real_escape_string($_POST['description']);
    $date_rapport = $conn->real_escape_string($_POST['date_rapport']);

    $sql = "UPDATE rapports SET type_rapport='$type_rapport', description='$description', date_rapport='$date_rapport' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Rapport mis à jour avec succès"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur : " . $conn->error]);
    }
}

$conn->close();
?>
