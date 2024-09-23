<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $formations = $_POST['formations'];
    $consultants = $_POST['consultants'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    $sql = "INSERT INTO parcours_formation (titre, formations, consultants, date_debut, date_fin) 
            VALUES ('$titre', '$formations', '$consultants', '$date_debut', '$date_fin')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Nouveau parcours ajouté avec succès"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur : " . $conn->error]);
    }
}

$conn->close();
?>
