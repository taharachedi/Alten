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

// Initialisation des variables pour les messages
$message = "";
$success = false;

// Vérification des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Préparation de la requête pour éviter les injections SQL
    $stmt = $conn->prepare("INSERT INTO administrators (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        // Inscription réussie
        $message = "Administrateur ajouté avec succès. <a href='admin-login.html'>Cliquez ici pour vous connecter</a>";
        $success = true;
    } else {
        $message = "Erreur : " . $stmt->error;
    }

    // Fermeture des ressources
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
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
              <h3>Inscription</h3>
            </div>
            <div class="card-body">
              <?php if ($success): ?>
                <div class="alert alert-success">
                  <?php echo $message; ?>
                </div>
              <?php else: ?>
                <form action="signup.php" method="POST">
                  <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Entrer votre nom" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre mot de passe" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                </form>
              <?php endif; ?>
            </div>
            <div class="card-footer text-center">
              <a href="admin-login.html">Déjà un compte ? Se connecter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
