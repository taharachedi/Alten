<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL si différent
$password = ""; // Remplacez par votre mot de passe MySQL si défini
$dbname = "alten";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Vérification des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Préparation de la requête pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT * FROM administrators WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Vérifier le mot de passe
        if (password_verify($password, $row['password'])) {
            // Connexion réussie
            session_start();
            $_SESSION['admin_id'] = $row['id']; // Enregistrer l'ID de l'administrateur
            header("Location: admin-dashboard.php"); // Redirection vers le tableau de bord
            exit();
        } else {
            // Connexion échouée
            echo "Email ou mot de passe invalide.";
        }
    } else {
        // Email non trouvé
        echo "Email ou mot de passe invalide.";
    }
    
    // Fermeture des ressources
    $stmt->close();
}

$conn->close();
?>
