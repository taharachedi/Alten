let currentEditId = null;
let currentType = '';

function openAddModal(type) {
    currentType = type;
    $('#addForm').empty();

    if (type === 'consultant') {
        $('#addForm').append(`
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
        `);
    } else if (type === 'projet') {
        $('#addForm').append(`
            <div class="form-group">
                <label for="nomProjet">Nom du projet</label>
                <input type="text" class="form-control" id="nomProjet" required>
            </div>
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" class="form-control" id="client" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" required>
            </div>
        `);
    } else if (type === 'formation') {
        $('#addForm').append(`
            <div class="form-group">
                <label for="intitule">Intitulé</label>
                <input type="text" class="form-control" id="intitule" required>
            </div>
            <div class="form-group">
                <label for="dateFormation">Date</label>
                <input type="date" class="form-control" id="dateFormation" required>
            </div>
        `);
    } else if (type === 'rapport') {
        $('#addForm').append(`
            <div class="form-group">
                <label for="titreRapport">Titre</label>
                <input type="text" class="form-control" id="titreRapport" required>
            </div>
            <div class="form-group">
                <label for="dateRapport">Date</label>
                <input type="date" class="form-control" id="dateRapport" required>
            </div>
        `);
    }

    $('#addModal').modal('show');
}

function openEditModal(type, id, ...values) {
    currentEditId = id;
    currentType = type;
    $('#editForm').empty();

    if (type === 'consultant') {
        $('#editForm').append(`
            <div class="form-group">
                <label for="editNom">Nom</label>
                <input type="text" class="form-control" id="editNom" value="${values[0]}" required>
            </div>
            <div class="form-group">
                <label for="editPrenom">Prénom</label>
                <input type="text" class="form-control" id="editPrenom" value="${values[1]}" required>
            </div>
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" id="editEmail" value="${values[2]}" required>
            </div>
        `);
    } else if (type === 'projet') {
        $('#editForm').append(`
            <div class="form-group">
                <label for="editNomProjet">Nom du projet</label>
                <input type="text" class="form-control" id="editNomProjet" value="${values[0]}" required>
            </div>
            <div class="form-group">
                <label for="editClient">Client</label>
                <input type="text" class="form-control" id="editClient" value="${values[1]}" required>
            </div>
            <div class="form-group">
                <label for="editStatus">Status</label>
                <input type="text" class="form-control" id="editStatus" value="${values[2]}" required>
            </div>
        `);
    } else if (type === 'formation') {
        $('#editForm').append(`
            <div class="form-group">
                <label for="editIntitule">Intitulé</label>
                <input type="text" class="form-control" id="editIntitule" value="${values[0]}" required>
            </div>
            <div class="form-group">
                <label for="editDateFormation">Date</label>
                <input type="date" class="form-control" id="editDateFormation" value="${values[1]}" required>
            </div>
        `);
    } else if (type === 'rapport') {
        $('#editForm').append(`
            <div class="form-group">
                <label for="editTitreRapport">Titre</label>
                <input type="text" class="form-control" id="editTitreRapport" value="${values[0]}" required>
            </div>
            <div class="form-group">
                <label for="editDateRapport">Date</label>
                <input type="date" class="form-control" id="editDateRapport" value="${values[1]}" required>
            </div>
        `);
    }

    $('#editModal').modal('show');
}

function deleteElement(type, id) {
    // Code de suppression ici
    alert(`Element ${type} avec ID ${id} a été supprimé.`);
}

// Appeler openAddModal(), openEditModal(), deleteElement() selon l'action utilisateur
