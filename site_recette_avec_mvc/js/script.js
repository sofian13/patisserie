function openLoginPage() {
    window.location.href = "/connexion";
}

function openRegPage() {
    window.location.href = "/inscription"
}

function openMdp() {
    window.location.href = "/Reinisialisation_mdp"
}

let input = document.getElementById('avatar');
let preview = document.getElementById('avatar-preview');

input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
    let curFiles = input.files;
    if (curFiles.length === 0) {
        preview.src = 'https://cdn.discordapp.com/attachments/885515822817234954/1063397423428403230/pngegg.png';
    } else {
        preview.src = window.URL.createObjectURL(curFiles[0]);
    }
}

function versConnexion() {
    window.location.href = '/connexion'
}

function versCreation() {
    window.location.href = '/recette'
}

function versAdmin() {
    window.location.href = '/Admin/checkAdmin'
}