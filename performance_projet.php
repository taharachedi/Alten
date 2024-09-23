<?php
header('Content-Type: application/json');

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

// Requête pour récupérer les performances des projets
$sql = "SELECT p.titre, SUM(pp.performance) AS total_performance
        FROM projets p
        LEFT JOIN performance_projet pp ON p.id = pp.projet_id
        GROUP BY p.id
        ORDER BY total_performance DESC";
$result = $conn->query($sql);

// Préparer les données pour le graphique
$data = [
    'labels' => [],
    'data' => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['labels'][] = $row['titre'];
        $data['data'][] = $row['total_performance'];
    }
} else {
    $data['labels'] = ['Aucun projet'];
    $data['data'] = [0];
}

// Fermer la connexion
$conn->close();

// Retourner les données en JSON
echo json_encode($data);
?>
