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
    $sql = "SELECT * FROM rapports WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rapport = $result->fetch_assoc();
        echo json_encode(["success" => true, "rapport" => $rapport]);
    } else {
        echo json_encode(["success" => false, "message" => "Rapport non trouvé"]);
    }
} else {
    $sql = "SELECT * FROM rapports";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rapports = [];
        while ($row = $result->fetch_assoc()) {
            $rapports[] = $row;
        }
        echo json_encode(["success" => true, "rapports" => $rapports]);
    } else {
        echo json_encode(["success" => false, "message" => "Aucun rapport trouvé"]);
    }
}

$conn->close();
?>
