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

// Obtenir les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_naissance = $_POST['date_naissance'];
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$grade = $_POST['grade'];
$projet_id = $_POST['projet_id'];
$date_entree = $_POST['date_entree'];
$poste_actuel = $_POST['poste_actuel'];
$departement = $_POST['departement'];
$responsable_id = $_POST['responsable_id'];

// Requête pour ajouter un consultant
$sql = "INSERT INTO consultants (nom, prenom, email, date_naissance, adresse, tel, grade, projet_id, date_entree, poste_actuel, departement, responsable_id) 
        VALUES ('$nom', '$prenom', '$email', '$date_naissance', '$adresse', '$tel', '$grade', '$projet_id', '$date_entree', '$poste_actuel', '$departement', '$responsable_id')";

if ($conn->query($sql) === TRUE) {
    // Récupérer la liste mise à jour des consultants
    $result = $conn->query("SELECT * FROM consultants");
    $consultants = [];
    while ($row = $result->fetch_assoc()) {
        $consultants[] = $row;
    }
    echo json_encode($consultants);
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();
?>
