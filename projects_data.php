<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les données des projets
$sql = "SELECT titre, COUNT(*) AS count FROM projets GROUP BY titre";
$result = $conn->query($sql);

$data = [];
$labels = [];
$values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['titre'];
        $values[] = $row['count'];
    }
}

$data['labels'] = $labels;
$data['data'] = $values;

echo json_encode($data);

$conn->close();
?>
