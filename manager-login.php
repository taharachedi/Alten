<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Initialisation des variables pour les messages
$message = "";
$success = false;

// Vérification des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Préparation de la requête pour éviter les injections SQL
        $stmt = $conn->prepare("SELECT password FROM managers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Vérification du mot de passe
            if (password_verify($password, $hashed_password)) {
                // Connexion réussie
                $success = true;
                header("Location: manager-dashboard.php");
                exit();
            } else {
                $message = "Email ou mot de passe invalide.";
            }
        } else {
            $message = "Email ou mot de passe invalide.";
        }

        // Fermeture des ressources
        $stmt->close();
    } else {
        $message = "Veuillez entrer votre email et mot de passe.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Manager</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="background-image">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-header text-center">
              <img src="images/alten-logo.png" alt="Logo ALTEN" class="img-fluid mb-3" style="max-width: 150px;">
              <h3>Connexion Manager</h3>
            </div>
            <div class="card-body">
              <?php if ($message): ?>
                <div class="alert alert-danger">
                  <?php echo $message; ?>
                </div>
              <?php endif; ?>
              <form action="manager-login.php" method="POST">
                <div class="form-group">
                  <label for="email">Adresse Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" required>
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
              </form>
            </div>
            <div class="card-footer text-center">
              <a href="signup1.html">Créer un compte</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>