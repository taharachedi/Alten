<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Managers</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header img {
            max-width: 150px;
        }

        nav {
            background-color: #007bff;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            padding: 20px;
        }

        .dashboard-stats, .project-overview, .consultant-performance, .trainings-overview, .reports-overview {
            margin-bottom: 20px;
        }

        .chart-container {
            position: relative;
            height: 400px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #007bff;
        }
        
        .btn-light:hover {
            background-color: #e2e6ea;
        }





 


    </style>
    
</head>
<body>
<header>
    <div class="container">
        <h1>📊 Tableau de Bord - Managers</h1>
        <img src="images/alten-logo.png" alt="Logo ALTEN" class="logo">
        <!-- Profile dropdown -->
        <div class="profile-dropdown" onclick="toggleDropdown()">
            <img src="images/manager.jpg" alt="Profile" class="profile-img">
            <div id="dropdown-menu" class="dropdown-menu">
                <div class="dropdown-menu-header">
                    <p><strong>Email:</strong> manager@alten.com</p>
                </div>
                <a class="dropdown-item" href="manager-login.html">🚪 Se déconnecter</a>
            </div>
        </div>
    </div>
</header>


<style>

               /* Profile dropdown */
               .profile-dropdown {
            position: absolute;
            right: 20px;
            top: 12%;
            transform: translateY(0%);
            cursor: pointer;
        }




        .profile-dropdown img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
    /* Style du profil aligné à droite */
    .profile-dropdown {
        position: relative;
        cursor: pointer;
    }





    /* Style général */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

/* Style de l'en-tête */
header {
    background-color: #004080;
    color: #fff;
    padding: 1rem 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative; /* Permet aux éléments enfants de se positionner relativement */
}

header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative; /* Permet à la dropdown de se positionner correctement */
}





    .profile-dropdown img {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        border: 2px solid #fff;
    }

    .profile-dropdown .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 0.5rem;
        left: -100px;
        top: 90px;
        border-radius: 0.25rem;
        z-index: 1000;
    }

    .profile-dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-item {
        color: #333;
        text-decoration: none;
        padding: 0.5rem 1rem;
        display: block;
        font-size: 0.875rem;
    }

    .dropdown-item:hover {
        background-color: #f4f4f4;
    }
</style>


<script>
    // JavaScript for toggling dropdown
function toggleDropdown() {
    const dropdownMenu = document.getElementById('dropdown-menu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
}

// Close dropdown if click outside
document.addEventListener('click', function(event) {
    const profileDropdown = document.querySelector('.profile-dropdown');
    if (!profileDropdown.contains(event.target)) {
        document.getElementById('dropdown-menu').style.display = 'none';
    }
});

</script>




    
<nav>
    <a href="#dashboard">📊 Tableau de Bord</a>
    <a href="#projects">📁 Projets</a>
    <a href="#consultants">👥 Consultants</a>
    <a href="#trainings">📚 Formations</a>
    <a href="#reports">📈 Rapports</a>
</nav>
<style>
    
</style>
    <main>


<!-- Performance des Projets -->
<section id="projects" class="project-performance">
    <h2>📈 Performance des Projets 🚀</h2>
    <div class="chart-container">
        <canvas id="performanceProjectChart"></canvas>
    </div>
</section>
<style>
    /* Style de la section Performance des Projets */
.project-performance {
    background-color: #f9f9f9; /* Couleur de fond */
    padding: 2rem; /* Espace interne */
    border-radius: 0.5rem; /* Coins légèrement arrondis */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre portée pour un effet de profondeur */
    margin: 2rem 0; /* Marge au-dessus et en dessous de la section */
}

.project-performance h2 {
    font-size: 1.5rem; /* Taille de la police */
    color: #004080; /* Couleur du texte */
    text-align: center; /* Centre le texte */
    margin-bottom: 1.5rem; /* Marge en dessous du titre */
    display: flex; /* Aligne les emojis avec le texte */
    justify-content: center; /* Centre le texte et les emojis horizontalement */
    align-items: center; /* Aligne le texte et les emojis verticalement */
    gap: 0.5rem; /* Espace entre les emojis et le texte */
}

/* Style du conteneur du graphique */
.chart-container {
    max-width: 1200px; /* Largeur maximale */
    margin: 0 auto; /* Centre le conteneur horizontalement */
    padding: 0 1rem; /* Espace interne horizontal */
}

/* Style pour le graphique Canvas */
#performanceProjectChart {
    display: block; /* Assure que le graphique est un bloc */
    width: 100%; /* Largeur complète */
    height: auto; /* Hauteur automatique pour conserver les proportions */
}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Fonction pour charger les données de performance des projets
function loadProjectPerformance() {
    fetch('performance_projet.php')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('performanceProjectChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Performance des Projets',
                        data: data.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true,
                            suggestedMax: 100, // Définir la valeur maximale suggérée à 100
                            ticks: {
                                stepSize: 10 // Définir la taille des pas pour les ticks, optionnel
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Erreur:', error));
}

// Charger les performances des projets lorsque la page est prête
document.addEventListener('DOMContentLoaded', function() {
    loadProjectPerformance();
});
</script>









        
 









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

// Requête pour récupérer les projets
$sql = "SELECT * FROM projets";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats
if ($result === false) {
    echo "Erreur lors de l'exécution de la requête: " . $conn->error;
    exit;
}
?>







<!-- Section: Gérer les projets -->
<h1 id="projets">📋 Gérer les projets 🛠️</h1>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>📂 Liste des projets</span>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalProjet">➕ Ajouter un projet</button>
    </div>
    <div class="card-body">

        <!-- Barre de recherche -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="🔍 Rechercher un projet...">

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Consultants</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="projectTableBody">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='project-row-" . htmlspecialchars($row['id']) . "'>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['titre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_debut']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_fin']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['consultants']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td class='actions'>
    <!-- Bouton Modifier -->
    <button class='btn btn-warning btn-sm' onclick='editProject(" . htmlspecialchars($row['id']) . ")'>
        ✏️ Modifier
    </button>
    
    <!-- Bouton Supprimer -->
    <button class='btn btn-danger btn-sm' onclick='deleteProject(" . htmlspecialchars($row['id']) . ")'>
        🗑️ Supprimer
    </button>
</td>
";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>📭 Aucun projet trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>




    /* Style de la section Gérer les projets */
.card {
    background-color: #ffffff; /* Couleur de fond blanche */
    border-radius: 0.5rem; /* Coins légèrement arrondis */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre portée pour un effet de profondeur */
    margin: 2rem 0; /* Marge au-dessus et en dessous de la carte */
}

.card-header {
    background-color: #004080; /* Couleur de fond de l'en-tête */
    color: #ffffff; /* Couleur du texte de l'en-tête */
    padding: 1rem; /* Espace interne */
    border-bottom: 1px solid #dddddd; /* Bordure inférieure */
    font-size: 1.2rem; /* Taille de la police */
}

.card-header button {
    font-size: 1rem; /* Taille de la police pour les boutons */
}

.card-body {
    padding: 1rem; /* Espace interne */
}

.table {
    margin: 0; /* Supprime la marge */
}

.table th, .table td {
    text-align: center; /* Centre le texte des cellules */
    vertical-align: middle; /* Aligne le texte verticalement au milieu */
}

.table thead {
    background-color: #004080; /* Couleur de fond de l'en-tête du tableau */
    color: #ffffff; /* Couleur du texte de l'en-tête du tableau */
}

.table .btn {
    font-size: 0.875rem; /* Taille de la police pour les boutons */
}

.table .btn-warning {
    background-color: #ffc107; /* Couleur de fond jaune pour le bouton de modification */
    border: none; /* Supprime la bordure */
}

.table .btn-danger {
    background-color: #dc3545; /* Couleur de fond rouge pour le bouton de suppression */
    border: none; /* Supprime la bordure */
}

.table .btn-sm {
    padding: 0.25rem 0.5rem; /* Padding pour les petits boutons */
}

</style>

<!-- Modal pour ajouter ou modifier un projet -->
<div class="modal fade" id="modalProjet" tabindex="-1" role="dialog" aria-labelledby="modalProjetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProjetLabel">📝 Ajouter/Modifier un Projet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="projectForm">
                    <input type="hidden" id="projectId" name="id">
                    <div class="form-group">
                        <label for="titre">📌 Titre du Projet</label>
                        <input type="text" class="form-control" id="projectTitle" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">📅 Date de Début</label>
                        <input type="date" class="form-control" id="projectStartDate" name="date_debut" required>
                    </div>
                    <div class="form-group">
                        <label for="date_fin">📅 Date de Fin</label>
                        <input type="date" class="form-control" id="projectEndDate" name="date_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="consultants">👥 Consultants (IDs séparés par des virgules)</label>
                        <input type="text" class="form-control" id="projectConsultants" name="consultants">
                    </div>
                    <div class="form-group">
                        <label for="description">📝 Description</label>
                        <textarea class="form-control" id="projectDescription" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">💾 Enregistrer</button>
                </form>
                <div id="messageProjet" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>


<style>
    /* Style pour les titres avec emojis */
.modal-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2c3e50;
}

/* Champs de formulaire stylisés */
.form-group label {
    font-weight: bold;
    color: #34495e;
}

/* Bouton d'enregistrement avec emoji */
.btn-success {
    background-color: #28a745;
    border: none;
    color: white;
    font-weight: bold;
}

/* Style pour l'icône de fermeture de la modal */
.close {
    color: #000;
    opacity: 0.8;
}

</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('projectForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le comportement de soumission par défaut

    var formData = new FormData(this);
    var id = document.getElementById('projectId').value;
    var actionUrl = id ? 'edit_project.php' : 'add_project.php';

    fetch(actionUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (id) {
                updateProjectRow(data);
            } else {
                addProjectRow(data);
            }
            document.getElementById('messageProjet').innerHTML = "Projet enregistré avec succès.";
            $('#modalProjet').modal('hide'); 
        } else {
            document.getElementById('messageProjet').innerHTML = "Erreur : " + data.message;
        }
    })
    .catch(error => console.error('Erreur:', error));
});

function addProjectRow(project) {
    const tbody = document.getElementById('projectTableBody');
    const row = document.createElement('tr');
    row.id = `project-row-${project.id}`;
    row.innerHTML = `
        <td>${project.id}</td>
        <td>${project.titre}</td>
        <td>${project.date_debut}</td>
        <td>${project.date_fin}</td>
        <td>${project.consultants}</td>
        <td>${project.description}</td>
        <td>
            <button class='btn btn-warning btn-sm' onclick='editProject(${project.id})'>Modifier</button>
            <button class='btn btn-danger btn-sm' onclick='deleteProject(${project.id})'>Supprimer</button>
        </td>
    `;
    tbody.appendChild(row);
}

function updateProjectRow(project) {
    const row = document.getElementById(`project-row-${project.id}`);
    if (row) {
        row.innerHTML = `
            <td>${project.id}</td>
            <td>${project.titre}</td>
            <td>${project.date_debut}</td>
            <td>${project.date_fin}</td>
            <td>${project.consultants}</td>
            <td>${project.description}</td>
            <td>
                <button class='btn btn-warning btn-sm' onclick='editProject(${project.id})'>Modifier</button>
                <button class='btn btn-danger btn-sm' onclick='deleteProject(${project.id})'>Supprimer</button>
            </td>
        `;
    }
}

function editProject(id) {
    fetch(`get_project.php?id=${id}`)
        .then(response => response.json())
        .then(project => {
            if (project.error) {
                console.error(project.error);
                return;
            }
            document.getElementById('projectId').value = project.id;
            document.getElementById('projectTitle').value = project.titre;
            document.getElementById('projectStartDate').value = project.date_debut;
            document.getElementById('projectEndDate').value = project.date_fin;
            document.getElementById('projectConsultants').value = project.consultants;
            document.getElementById('projectDescription').value = project.description;
            $('#modalProjet').modal('show');
        })
        .catch(error => console.error('Erreur:', error));
}



function deleteProject(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')) {
        fetch('delete_project.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`project-row-${id}`).remove();
            } else {
                alert("Erreur lors de la suppression du projet.");
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
}

// Charger les projets au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    // Initialisez le tableau avec les données existantes ou avec les données statiques si nécessaire
});



</script>








<!-- Performance des Consultants -->
<section id="consultants" class="consultant-performance">
    <h2>👩‍💼 Performance des Consultants 🏆</h2>
    <div class="chart-container">
        <canvas id="performanceChart"></canvas>
    </div>
</section>

<style>
   /* Style de la section Performance des Consultants */
.consultant-performance {
    background-color: #f9f9f9; /* Couleur de fond */
    padding: 2rem; /* Espace interne */
    border-radius: 0.5rem; /* Coins légèrement arrondis */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre portée pour un effet de profondeur */
    margin: 2rem 0; /* Marge au-dessus et en dessous de la section */
}

.consultant-performance h2 {
    font-size: 1.5rem; /* Taille de la police */
    color: #004080; /* Couleur du texte */
    text-align: center; /* Centre le texte */
    margin-bottom: 1.5rem; /* Marge en dessous du titre */
    display: flex; /* Aligne les emojis avec le texte */
    justify-content: center; /* Centre le texte et les emojis horizontalement */
    align-items: center; /* Aligne le texte et les emojis verticalement */
    gap: 0.5rem; /* Espace entre les emojis et le texte */
}

/* Style du conteneur du graphique */
.chart-container {
    max-width: 1200px; /* Largeur maximale */
    margin: 0 auto; /* Centre le conteneur horizontalement */
    padding: 0 1rem; /* Espace interne horizontal */
}

/* Style pour le graphique Canvas */
#performanceChart {
    display: block; /* Assure que le graphique est un bloc */
    width: 100%; /* Largeur complète */
    height: auto; /* Hauteur automatique pour conserver les proportions */
}


    </style>



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

        // Requête pour récupérer les consultants
        $sql = "SELECT * FROM consultants";
        $result = $conn->query($sql);

        // Vérifier si la requête a renvoyé des résultats
        if ($result === false) {
            echo "Erreur lors de l'exécution de la requête: " . $conn->error;
            exit;
        }
        ?>

  <!-- Section: Gérer les consultants -->
<h1 id="consultants">👥 Gestion des Consultants</h1>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>📋 Liste des Consultants</span>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalConsultant">
            ➕ Ajouter un Consultant
        </button>
    </div>
    <div class="card-body">
        <!-- Barre de recherche -->
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="🔍 Rechercher un consultant...">

            <style>
/* Réduire l'espacement du tableau */
.table {
    font-size: 14px;
}

.table td, .table th {
    padding: 5px;
}

/* Limiter la largeur maximale du tableau */
.table-container {
    max-width: 100%;
    overflow-x: auto;
}

/* Réduire la largeur des colonnes spécifiques */
.table td:nth-child(1), /* ID */
.table td:nth-child(7), /* Téléphone */
.table td:nth-child(9), /* Projet ID */
.table td:nth-child(13) /* Responsable ID */ {
    width: 80px;
}

/* Réduire la largeur des colonnes de texte plus long */
.table td:nth-child(5), /* Date de Naissance */
.table td:nth-child(10), /* Date d'entrée */
.table td:nth-child(11) /* Poste Actuel */ {
    width: 120px;
}

/* Restreindre la largeur totale du tableau */
.table {
    width: auto;
    margin: auto;
}

/* Ajustement pour appareils mobiles */
@media (max-width: 768px) {
    .table {
        font-size: 12px;
    }
    .table td, .table th {
        padding: 4px;
    }
}
</style>
            <table class="table table-bordered table-striped">
            <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Date de Naissance</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Grade</th>
        <th>Projet ID</th>
        <th>Date d'entrée</th>
        <th>Poste Actuel</th>
        <th>Département</th>
        <th>Responsable ID</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
            echo "<td>" . htmlspecialchars($row['adresse']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
            echo "<td>" . htmlspecialchars($row['projet_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date_entree']) . "</td>";
            echo "<td>" . htmlspecialchars($row['poste_actuel']) . "</td>";
            echo "<td>" . htmlspecialchars($row['departement']) . "</td>";
            echo "<td>" . htmlspecialchars($row['responsable_id']) . "</td>";
            echo "<td class='actions'>
            <!-- Bouton Modifier -->
            <button class='btn btn-warning btn-sm' onclick='editConsultant(" . htmlspecialchars($row['id']) . ")'>
                ✏️ Modifier
            </button>
            
            <!-- Bouton Supprimer -->
            <button class='btn btn-danger btn-sm' onclick='deleteConsultant(" . htmlspecialchars($row['id']) . ")'>
                🗑️ Supprimer
            </button>
        </td>
        ";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='14' class='text-center'>Aucun consultant trouvé.</td></tr>";
    }
    ?>
</tbody>

</table>

            </div>
        </div>



  <!-- Modal pour ajouter un consultant -->
<div class="modal fade" id="modalConsultant" tabindex="-1" role="dialog" aria-labelledby="modalConsultantLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConsultantLabel">➕ Ajouter un Consultant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="consultantForm">
                    <div class="form-group">
                        <label for="nom">👤 Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">🧑 Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">📧 Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">🎂 Date de Naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">🏠 Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="tel">📞 Téléphone</label>
                        <input type="text" class="form-control" id="tel" name="tel" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">⭐ Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="projet_id">🔢 ID Projet</label>
                        <input type="text" class="form-control" id="projet_id" name="projet_id">
                    </div>
                    <div class="form-group">
                        <label for="date_entree">📅 Date d'entrée</label>
                        <input type="date" class="form-control" id="date_entree" name="date_entree" required>
                    </div>
                    <div class="form-group">
                        <label for="poste_actuel">🏢 Poste Actuel</label>
                        <input type="text" class="form-control" id="poste_actuel" name="poste_actuel" required>
                    </div>
                    <div class="form-group">
                        <label for="departement">🏷️ Département</label>
                        <input type="text" class="form-control" id="departement" name="departement" required>
                    </div>
                    <div class="form-group">
                        <label for="responsable_id">👨‍💼 ID Responsable</label>
                        <input type="text" class="form-control" id="responsable_id" name="responsable_id">
                    </div>
                    <button type="submit" class="btn btn-primary">➕ Ajouter</button>
                </form>
                <div id="message" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>








<!-- Scripts JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.getElementById('consultantForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le comportement de soumission par défaut

    var formData = new FormData(this); // Crée un objet FormData avec les données du formulaire

    // Envoyer les données via AJAX
    fetch('add_consultant.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Afficher le message de succès
        document.getElementById('message').innerHTML = "Consultant ajouté avec succès.";

        // Réinitialiser le formulaire
        document.getElementById('consultantForm').reset();

        // Mettre à jour la table des consultants
        updateConsultantTable(data);

        // Optionnel : Fermer le modal après ajout
        $('#modalConsultant').modal('hide');
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
});

function updateConsultantTable(consultants) {
    const tbody = document.querySelector('.table tbody');
    tbody.innerHTML = ''; // Effacer le contenu existant

    consultants.forEach(consultant => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${consultant.id}</td>
            <td>${consultant.nom}</td>
            <td>${consultant.prenom}</td>
            <td>${consultant.email}</td>
            <td>${consultant.date_naissance}</td>
            <td>${consultant.adresse}</td>
            <td>${consultant.tel}</td>
            <td>${consultant.grade}</td>
            <td>${consultant.projet_id}</td>
            <td>${consultant.date_entree}</td>
            <td>${consultant.poste_actuel}</td>
            <td>${consultant.departement}</td>
            <td>${consultant.responsable_id}</td>
            <td>
                <button class='btn btn-warning btn-sm' onclick='editConsultant(${consultant.id})'>Modifier</button>
                <button class='btn btn-danger btn-sm' onclick='deleteConsultant(${consultant.id})'>Supprimer</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

function editConsultant(id) {
    // Redirige vers une page de modification avec l'ID du consultant
    window.location.href = 'edit_consultant.php?id=' + id;
}

function deleteConsultant(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce consultant ?')) {
        fetch('delete_consultant.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id }),
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            // Optionnel : Mettre à jour la table des consultants après suppression
            // reloadConsultants();
            location.reload(); // Recharger la page pour mettre à jour la liste
        })
        .catch(error => console.error('Erreur:', error));
    }
}
</script>



<script>
document.getElementById('consultantForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le comportement de soumission par défaut

    var formData = new FormData(this); // Crée un objet FormData avec les données du formulaire

    // Envoyer les données via AJAX
    fetch('add_consultant.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Afficher le message de succès
        document.getElementById('message').innerHTML = "Consultant ajouté avec succès.";

        // Réinitialiser le formulaire
        document.getElementById('consultantForm').reset();

        // Mettre à jour la table des consultants
        updateConsultantTable(data);

        // Optionnel : Fermer le modal après ajout
        $('#modalConsultant').modal('hide');
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
});

function updateConsultantTable(consultants) {
    const tbody = document.querySelector('.table tbody');
    tbody.innerHTML = ''; // Effacer le contenu existant

    consultants.forEach(consultant => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${consultant.id}</td>
            <td>${consultant.nom}</td>
            <td>${consultant.prenom}</td>
            <td>${consultant.email}</td>
            <td>${consultant.date_naissance}</td>
            <td>${consultant.adresse}</td>
            <td>${consultant.tel}</td>
            <td>${consultant.grade}</td>
            <td>${consultant.projet_id}</td>
            <td>${consultant.date_entree}</td>
            <td>${consultant.poste_actuel}</td>
            <td>${consultant.departement}</td>
            <td>${consultant.responsable_id}</td>
            <td>
                <button class='btn btn-warning btn-sm' onclick='editConsultant(${consultant.id})'>Modifier</button>
                <button class='btn btn-danger btn-sm' onclick='deleteConsultant(${consultant.id})'>Supprimer</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}
</script>






<!--Code parcours Formation--> 


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

// Requête pour récupérer les parcours de formation
$sql = "SELECT * FROM parcours_formation";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats
if ($result === false) {
    echo "Erreur lors de l'exécution de la requête: " . $conn->error;
    exit;
}
?>

<!-- Section: Gérer les parcours de formation -->
<section id="parcours" class="training-management">
    <h1>📚 Gérer les parcours de formation 🛠️</h1>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>📋 Liste des parcours de formation</span>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalParcours">➕ Ajouter un parcours</button>
        </div>
        <div class="card-body">
            <!-- Barre de recherche -->
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="🔍 Rechercher une formation...">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Liste des formations</th>
                    <th>Consultants</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="parcoursTableBody">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='parcours-row-" . htmlspecialchars($row['id']) . "'>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['titre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['formations']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['consultants']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_debut']) . " - " . htmlspecialchars($row['date_fin']) . "</td>";
                        echo "<td class='actions'>
                        <!-- Bouton Modifier -->
                        <button class='btn btn-action btn-warning' onclick='editParcours(" . htmlspecialchars($row['id']) . ")'>
                            ✏️ Modifier
                        </button>
                        
                        <!-- Bouton Supprimer -->
                        <button class='btn btn-action btn-danger' onclick='deleteParcours(" . htmlspecialchars($row['id']) . ")'>
                            🗑️ Supprimer
                        </button>
                    </td>
                    
                    ";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Aucun parcours trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>

    
/* Style pour les boutons d'action */
.btn-action {
    font-size: 0.875rem; /* Taille du texte uniforme */
    padding: 0.5rem 1rem; /* Padding uniforme pour tous les boutons */
    border-radius: 0.25rem; /* Coins légèrement arrondis */
    display: inline-flex;
    align-items: center; /* Aligne l'icône et le texte au centre */
    border: none; /* Supprime la bordure pour un look plus épuré */
    color: #fff; /* Couleur du texte uniforme */
    transition: background-color 0.3s; /* Transition pour les effets au survol */
}

/* Style spécifique pour le bouton Modifier */
.btn-warning {
    background-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
}

/* Style spécifique pour le bouton Supprimer */
.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

/* Évite les marges ou padding indésirables autour des boutons */
.actions .btn {
    margin: 0;
}

/* Optionnel : Si les boutons doivent avoir la même largeur */
.actions .btn-action {
    width: 100px; /* Ajustez cette valeur selon vos besoins */
    text-align: center; /* Centre le texte */
}


</style>

<!-- Modal pour ajouter ou modifier un parcours -->
<div class="modal fade" id="modalParcours" tabindex="-1" role="dialog" aria-labelledby="modalParcoursLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalParcoursLabel">📝 Ajouter/Modifier un Parcours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="parcoursForm">
                    <input type="hidden" id="parcoursId" name="id">
                    <div class="form-group">
                        <label for="titre">📚 Titre du Parcours</label>
                        <input type="text" class="form-control" id="parcoursTitle" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="formations">📝 Liste des Formations (séparées par des virgules)</label>
                        <input type="text" class="form-control" id="parcoursFormations" name="formations" required>
                    </div>
                    <div class="form-group">
                        <label for="consultants">👥 Consultants (IDs séparés par des virgules)</label>
                        <input type="text" class="form-control" id="parcoursConsultants" name="consultants">
                    </div>
                    <div class="form-group">
                        <label for="date_debut">📅 Date de Début</label>
                        <input type="date" class="form-control" id="parcoursStartDate" name="date_debut">
                    </div>
                    <div class="form-group">
                        <label for="date_fin">📅 Date de Fin</label>
                        <input type="date" class="form-control" id="parcoursEndDate" name="date_fin">
                    </div>
                    <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
                </form>
                <div id="messageParcours" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<style>
/* Style pour le titre de la modal */
.modal-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #2c3e50;
}

/* Style pour les labels */
.form-group label {
    font-size: 1.1rem;
    font-weight: bold;
    color: #34495e;
}

/* Style pour les boutons */
.btn-primary {
    background-color: #007bff;
    border: none;
    color: white;
    font-weight: bold;
}

/* Style pour les inputs */
.form-control {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px;
}

/* Style pour la close button */
.close {
    color: #000;
    opacity: 0.8;
}

/* Style pour les messages */
#messageParcours {
    font-size: 1rem;
    color: #e74c3c; /* Couleur pour les messages d'erreur */
}


</style>




<script>
// Gestion de l'ajout et de la modification des parcours
document.getElementById('parcoursForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le comportement de soumission par défaut

    var formData = new FormData(this);
    var id = document.getElementById('parcoursId').value;
    var actionUrl = id ? 'edit_parcours.php' : 'add_parcours.php';

    fetch(actionUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('messageParcours').innerHTML = "Parcours enregistré avec succès.";
            $('#modalParcours').modal('hide');
            reloadParcours(); // Recharger la table des parcours
        } else {
            document.getElementById('messageParcours').innerHTML = "Erreur : " + data.message;
        }
    })
    .catch(error => console.error('Erreur:', error));
});

// Rechargement de la table des parcours
function reloadParcours() {
    fetch('get_parcours.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateParcoursTable(data.parcours); 
            } else {
                document.getElementById('messageParcours').innerHTML = "Erreur : " + data.message;
            }
        })
        .catch(error => console.error('Erreur:', error));
}

// Mise à jour de la table des parcours
function updateParcoursTable(parcours) {
    const tbody = document.getElementById('parcoursTableBody');
    tbody.innerHTML = '';

    parcours.forEach(parcour => {
        const row = document.createElement('tr');
        row.id = `parcours-row-${parcour.id}`;
        row.innerHTML = `
            <td>${parcour.id}</td>
            <td>${parcour.titre}</td>
            <td>${parcour.formations}</td>
            <td>${parcour.consultants}</td>
            <td>${parcour.date_debut} - ${parcour.date_fin}</td>
            <td>
                <button class='btn btn-warning btn-sm' onclick='editParcours(${parcour.id})'>Modifier</button>
                <button class='btn btn-danger btn-sm' onclick='deleteParcours(${parcour.id})'>Supprimer</button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Modification d'un parcours
function editParcours(id) {
    fetch('get_parcours.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('parcoursId').value = data.parcours.id;
                document.getElementById('parcoursTitle').value = data.parcours.titre;
                document.getElementById('parcoursFormations').value = data.parcours.formations;
                document.getElementById('parcoursConsultants').value = data.parcours.consultants;
                document.getElementById('parcoursStartDate').value = data.parcours.date_debut;
                document.getElementById('parcoursEndDate').value = data.parcours.date_fin;
                $('#modalParcours').modal('show');
            } else {
                console.error('Erreur:', data.message);
            }
        })
        .catch(error => console.error('Erreur:', error));
}

// Suppression d'un parcours
function deleteParcours(id) {
    if (confirm('Voulez-vous vraiment supprimer ce parcours ?')) {
        fetch('delete_parcours.php?id=' + id, { method: 'GET' })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    reloadParcours(); // Recharger la table des parcours
                } else {
                    console.error('Erreur:', data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
}

</script>











<!-- Section: Gérer les rapports -->
<section id="rapports" class="reports-management">
    <h1>📑 Gérer les rapports 📈</h1>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>🗂️ Liste des rapports</span>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRapport">➕ Ajouter un rapport</button>
        </div>
        <div class="card-body">
            <!-- Barre de recherche -->
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="🔍 Rechercher un rapport...">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Type de Rapport</th>
                    <th>Description</th>
                    <th>Date du Rapport</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="rapportsTableBody">
                <!-- Les lignes seront ajoutées ici via JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal pour ajouter un rapport -->
<div class="modal fade" id="modalRapport" tabindex="-1" role="dialog" aria-labelledby="modalRapportLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRapportLabel">📝 Ajouter un Rapport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rapportForm">
                    <div class="form-group">
                        <label for="type_rapport">📄 Type de Rapport</label>
                        <input type="text" class="form-control" id="type_rapport" name="type_rapport" placeholder="Entrez le type de rapport" required>
                    </div>
                    <div class="form-group">
                        <label for="description">📝 Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Entrez une description détaillée" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date_rapport">📅 Date du Rapport</label>
                        <input type="date" class="form-control" id="date_rapport" name="date_rapport" required>
                    </div>
                    <button type="submit" class="btn btn-primary">✅ Ajouter</button>
                </form>
                <div id="message" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style pour le header du modal */
.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    padding: 1rem;
}

.modal-title {
    font-size: 1.25rem;
    color: #343a40;
}

/* Style pour le corps du modal */
.modal-body {
    padding: 1.25rem;
    font-size: 1rem;
}

/* Style pour le formulaire */
.form-group label {
    font-size: 1rem;
    color: #495057;
    display: flex;
    align-items: center;
}

.form-group input, .form-group textarea {
    font-size: 1rem;
    border-radius: 0.25rem;
    border: 1px solid #ced4da;
}

.form-group input::placeholder, .form-group textarea::placeholder {
    color: #6c757d;
}

/* Style pour le bouton Ajouter */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Style pour le message */
#message {
    font-size: 1rem;
    color: #dc3545;
}

</style>


<!-- Modal pour éditer un rapport -->
<div class="modal fade" id="modalEditRapport" tabindex="-1" role="dialog" aria-labelledby="modalEditRapportLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditRapportLabel">✏️ Modifier un Rapport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editRapportForm">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_type_rapport">📄 Type de Rapport</label>
                        <input type="text" class="form-control" id="edit_type_rapport" name="type_rapport" placeholder="Entrez le type de rapport" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">📝 Description</label>
                        <textarea class="form-control" id="edit_description" name="description" placeholder="Entrez une description détaillée" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_rapport">📅 Date du Rapport</label>
                        <input type="date" class="form-control" id="edit_date_rapport" name="date_rapport" required>
                    </div>
                    <button type="submit" class="btn btn-primary">💾 Sauvegarder</button>
                </form>
                <div id="editMessage" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>


<style>
    /* Style pour le header du modal */
.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    padding: 1rem;
}

.modal-title {
    font-size: 1.25rem;
    color: #343a40;
}

/* Style pour le corps du modal */
.modal-body {
    padding: 1.25rem;
    font-size: 1rem;
}

/* Style pour le formulaire */
.form-group label {
    font-size: 1rem;
    color: #495057;
    display: flex;
    align-items: center;
}

.form-group input, .form-group textarea {
    font-size: 1rem;
    border-radius: 0.25rem;
    border: 1px solid #ced4da;
}

.form-group input::placeholder, .form-group textarea::placeholder {
    color: #6c757d;
}

/* Style pour le bouton Sauvegarder */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Style pour le message */
#editMessage {
    font-size: 1rem;
    color: #dc3545;
}

</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    fetchRapports();
    
    document.getElementById('rapportForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        addRapport();
    });

    document.getElementById('editRapportForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire
        editRapportSubmit();
    });
});

function fetchRapports() {
    fetch('get_rapports.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tbody = document.getElementById('rapportsTableBody');
            tbody.innerHTML = '';
            data.rapports.forEach(rapport => {
                tbody.innerHTML += `
                    <tr>
                        <td>${rapport.id}</td>
                        <td>${rapport.type_rapport}</td>
                        <td>${rapport.description}</td>
                        <td>${rapport.date_rapport}</td>
                        <td class="actions">
                            <button class="btn btn-action btn-warning" onclick="editRapport(${rapport.id})">
                                ✏️ Modifier
                            </button>
                            <button class="btn btn-action btn-danger" onclick="deleteRapport(${rapport.id})">
                                🗑️ Supprimer
                            </button>
                        </td>
                    </tr>
                `;
            });
        } else {
            document.getElementById('rapportsTableBody').innerHTML = `<tr><td colspan="5">${data.message}</td></tr>`;
        }
    });
}
function addRapport() {
    const formData = new FormData(document.getElementById('rapportForm'));
    fetch('add_rapport.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('message').innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            document.getElementById('rapportForm').reset();
            $('#modalRapport').modal('hide');
            fetchRapports();
        } else {
            document.getElementById('message').innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
        }
    });
}

function editRapport(id) {
    fetch(`get_rapports.php?id=${id}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const rapport = data.rapport;
            document.getElementById('edit_id').value = rapport.id;
            document.getElementById('edit_type_rapport').value = rapport.type_rapport;
            document.getElementById('edit_description').value = rapport.description;
            document.getElementById('edit_date_rapport').value = rapport.date_rapport;
            $('#modalEditRapport').modal('show');
        } else {
            alert(data.message);
        }
    });
}

function editRapportSubmit() {
    const formData = new FormData(document.getElementById('editRapportForm'));
    fetch('edit_rapport.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('editMessage').innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            $('#modalEditRapport').modal('hide');
            fetchRapports(); // Actualiser la liste des rapports
        } else {
            document.getElementById('editMessage').innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
        }
    });
}

function deleteRapport(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')) {
        fetch(`delete_rapport.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchRapports();
            } else {
                alert(data.message);
            }
        });
    }
}
</script>

<!-- Scripts JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>












       


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fonction pour charger les données des projets
    function loadProjectData() {
        $.getJSON('projects_data.php', function(data) {
            var ctx = document.getElementById('projectChart').getContext('2d');
            var projectChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Projets en cours',
                        data: data.data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    }

    // Fonction pour charger les données de performance
    function loadPerformanceData() {
        $.getJSON('performance_data.php', function(data) {
            var ctx = document.getElementById('performanceChart').getContext('2d');
            var performanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Performance des Consultants',
                        data: data.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
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
        }).fail(function() {
            console.error("Erreur lors du chargement des données.");
        });
    }

    // Charger les données lors du chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        loadProjectData();
        loadPerformanceData();
    });
</script>



</body>
</html>
