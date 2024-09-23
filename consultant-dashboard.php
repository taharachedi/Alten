<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assurez-vous que l'ID du consultant est défini dans la session
    if (isset($_SESSION['consultant_id'])) {
        $consultant_id = $_SESSION['consultant_id'];

        // Vérifiez l'ID du consultant
        if (empty($consultant_id)) {
            $nom = $email = "Inconnu";
        } else {
            // Requête pour récupérer les informations du consultant
            $stmt = $pdo->prepare("SELECT nom, email FROM consultant_login WHERE id = ?");
            $stmt->execute([$consultant_id]);
            $consultant = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($consultant) {
                $nom = htmlspecialchars($consultant['nom']);
                $email = htmlspecialchars($consultant['email']);
            } else {
                $nom = $email = "Inconnu";
            }
        }
    } else {
        $nom = $email = "Inconnu";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Consultant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9f5e9; /* Couleur de fond légère */
            color: #333;
        }

        header {
            background-color: #4c5246; /* Couleur verte foncée */
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header img {
            max-width: 150px;
        }

        nav {
            background-color: #3b9a6f; /* Couleur verte claire */
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        main {
            padding: 20px;
        }

        .dashboard-stats, .project-overview, .training-overview, .consultant-performance, .reports-overview {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #3b9a6f; /* Couleur verte claire */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2d6a4f; /* Couleur verte foncée */
        }

        .btn-light {
            background-color: #ffffff;
            color: #3b9a6f; /* Couleur verte claire */
            border: 1px solid #3b9a6f;
        }

        .btn-light:hover {
            background-color: #f1f1f1;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin: 5px 0;
        }

        .table thead th {
            background-color: #2d6a4f; /* Couleur verte foncée */
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }




               /* Profile dropdown */
               .profile-dropdown {
            position: absolute;
            right: 20px;
            top: 12%;
            transform: translateY(-50%);
            cursor: pointer;
        }




        .profile-dropdown img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
            padding: 0;
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>📊 Tableau de Bord - Consultant 🕵️‍♂️</h1>
        <img src="images/alten-logo.png" alt="Logo ALTEN" class="logo">
    </div>

</header>
<nav>
    <div class="container">
        <div class="user-info">
            <!-- Profile dropdown -->
            <div class="dropdown profile-dropdown">
                <img src="images/consultant.jpg" alt="Profile" class="profile-img">
                <div class="dropdown-menu">
                    <p class="dropdown-item">📧 Email: admin@example.com</p>
                    <a class="dropdown-item" href="consultant-login.html">🚪 Se déconnecter</a>
                </div>
            </div>
            <p>👋 Bienvenue, <?php echo $nom; ?> !</p>
            <p>📧 Email : <?php echo $email; ?></p>
        </div>
    </div>
</nav>



    <main>



<!-- Section Notifications -->
<section class="notifications-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">🔔 Notifications</h2>
        <div class="alert alert-warning d-flex align-items-center">
            <span class="emoji-icon mr-3">⚠️</span>
            <div>
                <p><strong>Rappel :</strong> Votre objectif de devenir chef de projet est à 70% d'accomplissement. Il reste 4 mois avant la date limite.</p>
            </div>
        </div>
        <div class="alert alert-info d-flex align-items-center">
            <span class="emoji-icon mr-3">📅</span>
            <div>
                <p>Votre prochaine évaluation est prévue pour le 1er décembre 2024.</p>
            </div>
        </div>
    </div>
</section>

<!-- Style pour la section Notifications -->
<style>
    .notifications-section {
        background-color: #e9f5e9; /* Couleur de fond verte légère */
    }

    .notifications-section h2 {
        font-size: 2rem;
        color: #333;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .alert {
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .alert-warning {
        background-color: #fff3cd; /* Couleur de fond de l'alerte */
        border-color: #ffeeba; /* Bordure de l'alerte */
        color: #856404; /* Couleur du texte de l'alerte */
    }

    .alert-info {
        background-color: #d1ecf1; /* Couleur de fond de l'alerte */
        border-color: #bee5eb; /* Bordure de l'alerte */
        color: #0c5460; /* Couleur du texte de l'alerte */
    }

    .emoji-icon {
        font-size: 2rem;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .mr-3 {
        margin-right: 1rem;
    }
</style>








<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assurez-vous que l'ID du consultant est défini dans la session
    if (isset($_SESSION['consultant_id'])) {
        $consultant_id = $_SESSION['consultant_id'];

        // Requête pour récupérer les performances
        $stmt = $pdo->prepare("SELECT * FROM performances WHERE consultant_id = ?");
        $stmt->execute([$consultant_id]);
        $performances = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Requête pour récupérer les rapports
        $stmt = $pdo->prepare("SELECT * FROM rapports"); // Adaptez cette requête selon vos besoins
        $stmt->execute();
        $rapports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        echo "ID du Consultant non défini dans la session.<br>";
        $performances = [];
        $rapports = [];
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!-- Section Performances -->
<section class="container my-5">
    <h2 class="mb-4 text-center">📊 Performance</h2>
    <?php if (!empty($performances)): ?>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📈 Graphique de Croissance</h5>
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($performances as $performance): ?>
        <?php
            // Ajustement du score pour correspondre à la visualisation graphique
            $adjustedScore = htmlspecialchars($performance['score']) * 0.8;
        ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📅 Performance du Mois</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($performance['date_performance']); ?></h6>
                    <p class="card-text">Score: <strong><?php echo $adjustedScore; ?></strong></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="alert alert-info d-flex align-items-center" role="alert">
        <span class="emoji-icon mr-3">🚫</span>
        <div>
            Aucune performance trouvée pour ce consultant.
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- Inclure Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('performanceChart').getContext('2d');

    // Récupération des données PHP
    var labels = <?php echo json_encode(array_column($performances, 'date_performance')); ?>;
    var scores = <?php echo json_encode(array_column($performances, 'score')); ?>;

    // Diminuer les scores pour le graphique
    var adjustedScores = scores.map(function(score) {
        return score * 0.8; // Réduit le score à 80% de sa valeur originale
    });

    var performanceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Score de Performance',
                data: adjustedScores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Fond sous le graphique
                borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
                borderWidth: 2,
                fill: true // Remplit sous la courbe
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<!-- Styles -->
<style>


    .card {
        border-radius: 15px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .emoji-icon {
        font-size: 1.5rem;
    }

    .alert {
        border-radius: 15px;
        padding: 15px;
    }

    .alert-info {
        background-color: #d1ecf1; /* Couleur de fond de l'alerte */
        border-color: #bee5eb; /* Bordure de l'alerte */
        color: #0c5460; /* Couleur du texte de l'alerte */
    }
    
    .alert-warning {
        background-color: #fff3cd; /* Couleur de fond de l'alerte */
        border-color: #ffeeba; /* Bordure de l'alerte */
        color: #856404; /* Couleur du texte de l'alerte */
    }
</style>








<h2 class="mb-4 text-center">🛠️ Compétences et Certifications</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Compétence</th>
            <th>Niveau</th>
            <th>Date d'obtention</th>
            <th>Certification</th>
            <th>Badge</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>HTML <i class="fa fa-html5" aria-hidden="true"></i></td>
            <td>Avancé</td>
            <td>2024-03-15</td>
            <td>Certification W3C</td>
            <td><span class="badge bg-success">HTML5 Certified 🎓</span></td>
        </tr>
        <tr>
            <td>CSS <i class="fa fa-css3-alt" aria-hidden="true"></i></td>
            <td>Intermédiaire</td>
            <td>2024-04-10</td>
            <td>Certification CSS Mastery</td>
            <td><span class="badge bg-primary">CSS Expert 🏅</span></td>
        </tr>
        <tr>
            <td>JavaScript <i class="fa fa-js" aria-hidden="true"></i></td>
            <td>Avancé</td>
            <td>2024-05-20</td>
            <td>Certification JavaScript ES6</td>
            <td><span class="badge bg-warning">JavaScript Pro 💡</span></td>
        </tr>
        <tr>
            <td>React <i class="fa fa-react" aria-hidden="true"></i></td>
            <td>Débutant</td>
            <td>2024-06-15</td>
            <td>Certification React Developer</td>
            <td><span class="badge bg-info">React Novice 🎉</span></td>
        </tr>
        <!-- Ajoutez d'autres compétences et certifications ici -->
    </tbody>
</table>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    table {
        background-color: #f8f9fa; /* Fond clair pour le tableau */
        border-radius: 15px;
        overflow: hidden;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    .badge {
        font-size: 0.9rem;
        border-radius: 12px;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }

    .fa {
        margin-left: 5px;
    }
</style>







<h2 class="mb-4 text-center">📚 Parcours de Formation</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Parcours</th>
            <th>Progression</th>
            <th>Formations Suivies</th>
            <th>Prochaine Formation</th>
            <th>Date</th>
            <th>Certificat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Développeur Frontend <i class="fa fa-laptop-code" aria-hidden="true"></i></td>
            <td>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
            </td>
            <td>HTML, CSS, JavaScript</td>
            <td>React Avancé <i class="fa fa-react" aria-hidden="true"></i></td>
            <td>2024-09-10 📅</td>
            <td><a href="#" class="btn btn-success btn-sm">Télécharger le Certificat 🎓</a></td>
        </tr>
        <tr>
            <td>Développeur Backend <i class="fa fa-server" aria-hidden="true"></i></td>
            <td>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                </div>
            </td>
            <td>PHP, MySQL</td>
            <td>Node.js <i class="fa fa-node" aria-hidden="true"></i></td>
            <td>2024-10-01 📅</td>
            <td><a href="#" class="btn btn-success btn-sm">Télécharger le Certificat 🎓</a></td>
        </tr>
        <!-- Ajoutez d'autres parcours de formation ici -->
    </tbody>
</table>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    table {
        background-color: #f8f9fa; /* Fond clair pour le tableau */
        border-radius: 15px;
        overflow: hidden;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    .progress-bar {
        font-size: 0.85rem;
    }

    .btn {
        font-size: 0.85rem;
        border-radius: 12px;
    }

    .fa {
        margin-left: 5px;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }
</style>










<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alten";

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification que l'ID du consultant est défini dans la session
    if (isset($_SESSION['consultant_id'])) {
        $consultant_id = $_SESSION['consultant_id'];
        echo "Consultant ID : " . htmlspecialchars($consultant_id) . "<br>";  // Debug : Affiche l'ID du consultant

        // Requête pour récupérer les projets assignés au consultant
        $stmt = $pdo->prepare("SELECT * FROM projets WHERE FIND_IN_SET(:consultant_id, consultants)");
        $stmt->bindParam(':consultant_id', $consultant_id, PDO::PARAM_INT);
        $stmt->execute();
        $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$projets) {
            echo "Aucun projet trouvé pour cet ID de consultant.<br>";  // Debug : Message si aucun projet n'est trouvé
        }
    } else {
        echo "Consultant non connecté.<br>";
        $projets = [];
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!-- Section Projets Assignés -->
<section class="container my-5">
    <h2 class="mb-4 text-center">🗂️ Projets Assignés</h2>
    <?php if (!empty($projets)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID <i class="fa fa-id-badge" aria-hidden="true"></i></th>
                <th>Titre <i class="fa fa-tag" aria-hidden="true"></i></th>
                <th>Date Début <i class="fa fa-calendar-day" aria-hidden="true"></i></th>
                <th>Date Fin <i class="fa fa-calendar-week" aria-hidden="true"></i></th>
                <th>Description <i class="fa fa-info-circle" aria-hidden="true"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projets as $projet): ?>
            <tr>
                <td><?php echo htmlspecialchars($projet['id']); ?></td>
                <td><?php echo htmlspecialchars($projet['titre']); ?></td>
                <td><?php echo htmlspecialchars($projet['date_debut']); ?> 🗓️</td>
                <td><?php echo htmlspecialchars($projet['date_fin']); ?> 🗓️</td>
                <td><?php echo htmlspecialchars($projet['description']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="text-center">🚫 Aucun projet trouvé pour ce consultant.</p>
    <?php endif; ?>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    table {
        background-color: #f8f9fa; /* Fond clair pour le tableau */
        border-radius: 15px;
        overflow: hidden;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
    }

    .fa {
        margin-left: 5px;
    }

    .bg-success {
        background-color: #28a745 !important;
    }
</style>










<!-- Section Rapports -->
<section class="container my-5">
    <h2 class="mb-4 text-center">📑 Rapports</h2>
    <?php if (!empty($rapports)): ?>
    <div class="row">
        <?php foreach ($rapports as $rapport): ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rapport ID: <?php echo htmlspecialchars($rapport['id']); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-file-alt" aria-hidden="true"></i> <?php echo htmlspecialchars($rapport['type_rapport']); ?></h6>
                    <p class="card-text"><?php echo htmlspecialchars($rapport['description']); ?></p>
                    <p class="card-text"><small class="text-muted"><i class="fa fa-calendar-day" aria-hidden="true"></i> Date: <?php echo htmlspecialchars($rapport['date_rapport']); ?></small></p>

                    <?php 
                    // Nom du fichier à télécharger
                    $fileName = 'Rapport_Taha.pdf';
                    $filePath = 'files/' . $fileName;
                    
                    // Vérifiez si le fichier existe avant d'afficher le bouton
                    if (file_exists($filePath)): 
                    ?>
                        <!-- Bouton Télécharger -->
                        <a href="<?php echo $filePath; ?>" class="btn btn-primary" download><i class="fa fa-download" aria-hidden="true"></i> Télécharger</a>
                    <?php else: ?>
                        <!-- Bouton Télécharger désactivé -->
                        <a href="#" class="btn btn-danger disabled"><i class="fa fa-ban" aria-hidden="true"></i> Télécharger</a>
                    <?php endif; ?>
                    
                    <!-- Bouton Modifier -->
                    <a href="edit-report.php?id=<?php echo htmlspecialchars($rapport['id']); ?>" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="alert alert-info text-center" role="alert">
        🚫 Aucun rapport trouvé pour ce consultant.
    </div>
    <?php endif; ?>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card-title {
        font-size: 1.25rem;
    }
    
    .card-subtitle {
        font-size: 1rem;
    }
    
    .btn {
        margin-right: 5px;
    }
</style>









<!-- Section Historique des Projets -->
<section class="project-history-section container my-5">
    <h2 class="mb-4 text-center">🗂️ Historique des Projets</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-id-badge" aria-hidden="true"></i> ID</th>
                <th><i class="fa fa-briefcase" aria-hidden="true"></i> Titre</th>
                <th><i class="fa fa-calendar-day" aria-hidden="true"></i> Date Début</th>
                <th><i class="fa fa-calendar-day" aria-hidden="true"></i> Date Fin</th>
                <th><i class="fa fa-user-tie" aria-hidden="true"></i> Rôle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Développement Web</td>
                <td>01/08/2024</td>
                <td>31/12/2024</td>
                <td>Développeur Frontend</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Analyse de Données</td>
                <td>08/02/2024</td>
                <td>31/12/2024</td>
                <td>Analyste de Données</td>
            </tr>
            <!-- Ajoutez d'autres projets ici -->
        </tbody>
    </table>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    .project-history-section {
      
        border-radius: 10px;
        padding: 20px;
    }
    
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    
    .table th {
        background-color: #007bff;
        color: white;
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #e9ecef;
    }
    
    .text-center {
        text-align: center;
    }
    
    .container {
        max-width: 1200px;
    }
</style>








<!-- Section Récompenses et Réalisations -->
<section class="rewards-achievements-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">🏆 Récompenses et Réalisations 🌟</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card reward-card shadow-lg text-center">
                    <div class="card-body">
                        <div class="icon mb-3">
                            <span class="emoji-icon">🏅</span>
                        </div>
                        <h5 class="card-title">Prix du Meilleur Consultant</h5>
                        <p class="card-text">Reconnu comme le meilleur consultant de l'année pour l'excellence dans les projets.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card achievement-card shadow-lg text-center">
                    <div class="card-body">
                        <div class="icon mb-3">
                            <span class="emoji-icon">💡</span>
                        </div>
                        <h5 class="card-title">Excellence en Innovation</h5>
                        <p class="card-text">Reconnu pour des contributions exceptionnelles à l'innovation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card recognition-card shadow-lg text-center">
                    <div class="card-body">
                        <div class="icon mb-3">
                            <span class="emoji-icon">🌟</span>
                        </div>
                        <h5 class="card-title">Leader d'Équipe</h5>
                        <p class="card-text">Récompensé pour avoir dirigé une équipe de 10 consultants sur le projet "Optimisation des Processus".</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
/* Style amélioré pour la section Récompenses et Réalisations */
.rewards-achievements-section {
    background-color: #e9f5e9; /* Couleur de fond verte très claire pour correspondre au reste de la page */
}

.rewards-achievements-section h2 {
    font-size: 2.5rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 40px;
}

.card {
    border: none;
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.icon {
    font-size: 3rem;
}

.emoji-icon {
    font-size: 3.5rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 15px;
}

.card-text {
    font-size: 1rem;
    color: #666;
}

.reward-card {
    background-color: #ffffff; /* Fond blanc pour les cartes de récompenses */
    border-left: 5px solid #ffc107; /* Couleur d'accentuation jaune pour les récompenses */
}

.achievement-card {
    background-color: #ffffff; /* Fond blanc pour les cartes de réalisation */
    border-left: 5px solid #28a745; /* Couleur d'accentuation verte pour les réalisations */
}

.recognition-card {
    background-color: #ffffff; /* Fond blanc pour les cartes de reconnaissance */
    border-left: 5px solid #007bff; /* Couleur d'accentuation bleue pour la reconnaissance */
}

</style>





<!-- Section Opportunités de Développement -->
<section class="development-opportunities-section container my-5">
    <h2 class="mb-4 text-center">🚀 Opportunités de Développement</h2>
    <div class="card-deck">
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-chalkboard-teacher" aria-hidden="true"></i> Formation Leadership</h5>
                <p class="card-text">Améliorez vos compétences en gestion d'équipe avec cette formation en leadership.</p>
                <button class="btn btn-success">Inscription</button>
            </div>
        </div>
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-lightbulb" aria-hidden="true"></i> Projet Innovation Interne</h5>
                <p class="card-text">Participez à un projet innovant pour améliorer nos processus internes.</p>
                <button class="btn btn-success">Participer</button>
            </div>
        </div>
        <!-- Ajoutez d'autres opportunités ici -->
    </div>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    .development-opportunities-section {
        border-radius: 10px;
        padding: 20px;
    }
    
    .card-deck .card {
        margin-bottom: 20px;
    }
    
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    
    .card-body {
        text-align: center;
    }
    
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    
    .container {
        max-width: 1200px;
    }
    
    .text-center {
        text-align: center;
    }
</style>






<!-- Section Objectifs de Carrière -->
<section class="career-goals-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Objectifs de Carrière</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card career-goal-card shadow-lg text-center">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Promotion au Niveau Senior</h5>
                        <p class="card-text">Progression vers un poste de seniorité en gestion de projet.</p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card career-goal-card shadow-lg text-center">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Obtention d'une Certification PMP</h5>
                        <p class="card-text">Préparation pour la certification PMP en gestion de projet.</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card career-goal-card shadow-lg text-center">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Leadership en Gestion de Projet</h5>
                        <p class="card-text">Développer des compétences en leadership et gestion d'équipe.</p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Section Engagement et Participation -->
<section class="engagement-section container my-5">
    <h2 class="mb-4 text-center">🌟 Engagement et Participation</h2>
    <div class="card-deck">
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-lightbulb" aria-hidden="true"></i> Club Innovation</h5>
                <p class="card-text">Participation active au club d'innovation pour proposer des solutions technologiques novatrices.</p>
            </div>
        </div>
        <div class="card border-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-users" aria-hidden="true"></i> Team Building</h5>
                <p class="card-text">Participation aux activités de team building organisées en juin 2024.</p>
            </div>
        </div>
        <!-- Ajoutez d'autres engagements ici -->
    </div>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    .engagement-section {

        border-radius: 10px;
        padding: 20px;
    }
    
    .card-deck .card {
        margin-bottom: 20px;
    }
    
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    
    .card-body {
        text-align: center;
    }
    
    .container {
        max-width: 1200px;
    }
    
    .text-center {
        text-align: center;
    }
</style>







<!-- Section Feedback et Reconnaissance -->
<section class="feedback-recognition-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">📢 Feedback et Reconnaissance 🏆</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card feedback-card shadow-lg">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-0">"Excellent travail sur le projet de développement web ! Votre contribution a été essentielle au succès."</p>
                            <footer class="blockquote-footer">
                                <i class="fa fa-user-tie" aria-hidden="true"></i> Manager de Projet
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card recognition-card shadow-lg text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-trophy" aria-hidden="true"></i> Points de Reconnaissance</h5>
                        <p class="card-text">Accumulez des points pour des performances exceptionnelles et des contributions remarquables.</p>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<!-- Styles -->
<style>
    .feedback-recognition-section {

        border-radius: 10px;
        padding: 20px;
    }
    
    .feedback-card, .recognition-card {
        border-radius: 10px;
    }
    
    .feedback-card blockquote {
        border-left: 4px solid #007bff;
    }
    
    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }
    
    .progress-bar {
        height: 20px;
        line-height: 20px;
    }
    
    .container {
        max-width: 1200px;
    }
    
    .text-center {
        text-align: center;
    }
</style>



<!-- Section Feedback et Suggestions -->
<section class="feedback-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">📝 Feedback et Suggestions 💬</h2>
        <form>
            <div class="form-group">
                <label for="feedback"><i class="fa fa-comments" aria-hidden="true"></i> Votre Feedback</label>
                <textarea class="form-control" id="feedback" rows="4" placeholder="Donnez votre feedback ici..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</section>

<!-- Inclure Font Awesome pour les icônes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
