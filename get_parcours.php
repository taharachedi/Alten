<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM parcours_formation WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parcours = $result->fetch_assoc();
        echo json_encode(["success" => true, "parcours" => $parcours]);
    } else {
        echo json_encode(["success" => false, "message" => "Parcours non trouvé"]);
    }
} else {
    $sql = "SELECT * FROM parcours_formation";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $parcours = [];
        while($row = $result->fetch_assoc()) {
            $parcours[] = $row;
        }
        echo json_encode(["success" => true, "parcours" => $parcours]);
    } else {
        echo json_encode(["success" => false, "message" => "Aucun parcours trouvé"]);
    }
}

$conn->close();
?>
