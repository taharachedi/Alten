<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];
    $grade = $_POST['grade'];
    $projet_id = $_POST['projet_id'];
    $poste_actuel = $_POST['poste_actuel'];
    $departement = $_POST['departement'];
    $responsable_id = $_POST['responsable_id'];

    $sql = "UPDATE consultants SET 
            nom = '$nom', prenom = '$prenom', email = '$email', 
            date_naissance = '$date_naissance', adresse = '$adresse', 
            tel = '$tel', grade = '$grade', projet_id = '$projet_id', 
            poste_actuel = '$poste_actuel', departement = '$departement', 
            responsable_id = '$responsable_id' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin-dashboard.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

$id = $_GET['id'];
$sql = "SELECT * FROM consultants WHERE id = $id";
$result = $conn->query($sql);
$consultant = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Consultant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>✏️ Modifier Consultant</h1>
    <form action="edit_consultant.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($consultant['id']); ?>">
        <div class="form-group">
            <label for="nom">👤 Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($consultant['nom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">🧑 Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($consultant['prenom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">📧 Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($consultant['email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">🎂 Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($consultant['date_naissance']); ?>" required>
        </div>
        <div class="form-group">
            <label for="adresse">🏠 Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo htmlspecialchars($consultant['adresse']); ?>" required>
        </div>
        <div class="form-group">
            <label for="tel">📞 Téléphone</label>
            <input type="text" class="form-control" id="tel" name="tel" value="<?php echo htmlspecialchars($consultant['tel']); ?>" required>
        </div>
        <div class="form-group">
            <label for="grade">⭐ Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" value="<?php echo htmlspecialchars($consultant['grade']); ?>" required>
        </div>
        <div class="form-group">
            <label for="projet_id">🔢 ID Projet</label>
            <input type="text" class="form-control" id="projet_id" name="projet_id" value="<?php echo htmlspecialchars($consultant['projet_id']); ?>">
        </div>
        <div class="form-group">
            <label for="poste_actuel">🏢 Poste Actuel</label>
            <input type="text" class="form-control" id="poste_actuel" name="poste_actuel" value="<?php echo htmlspecialchars($consultant['poste_actuel']); ?>" required>
        </div>
        <div class="form-group">
            <label for="departement">🏷️ Département</label>
            <input type="text" class="form-control" id="departement" name="departement" value="<?php echo htmlspecialchars($consultant['departement']); ?>" required>
        </div>
        <div class="form-group">
            <label for="responsable_id">👨‍💼 ID Responsable</label>
            <input type="text" class="form-control" id="responsable_id" name="responsable_id" value="<?php echo htmlspecialchars($consultant['responsable_id']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">💾 Sauvegarder</button>
    </form>
</div>

</body>
</html>
