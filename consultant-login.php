<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assurez-vous que les champs email et password sont bien envoyés
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête pour récupérer le mot de passe hashé du consultant
        $stmt = $conn->prepare("SELECT id, password FROM consultant_login WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Le consultant existe, récupérer l'ID et le mot de passe hashé
            $stmt->bind_result($consultant_id, $hashed_password);
            $stmt->fetch();

            // Vérifier le mot de passe
            if (password_verify($password, $hashed_password)) {
                // Mot de passe correct, démarrer la session et rediriger vers le tableau de bord
                $_SESSION['consultant_id'] = $consultant_id;
                header("Location: consultant-dashboard.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Email non trouvé.";
        }

        $stmt->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

$conn->close();
?>
