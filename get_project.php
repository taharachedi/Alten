<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => $conn->connect_error]);
    exit;
}

$id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT * FROM projets WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $project = $result->fetch_assoc();
    echo json_encode($project);
} else {
    echo json_encode(['success' => false, 'error' => 'Projet non trouvé.']);
}

$conn->close();
?>
