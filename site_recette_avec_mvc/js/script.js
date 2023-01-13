function openLoginPage() {
    document.querySelector(".reg").classList.remove("show-page");
    document.querySelector(".login").classList.add("show-page");
    document.getElementById("login-action").classList.add("show");
    document.getElementById("reg-action").classList.remove("show");
}

function openRegPage() {
    document.querySelector(".reg").classList.add("show-page");
    document.querySelector(".login").classList.remove("show-page");
    document.getElementById("reg-action").classList.add("show");
    document.getElementById("login-action").classList.remove("show");
}

let input = document.getElementById('avatar');
let preview = document.getElementById('avatar-preview');

input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
    let curFiles = input.files;
    if (curFiles.length === 0) {
        preview.src = 'path/to/default-avatar.png';
    } else {
        preview.src = window.URL.createObjectURL(curFiles[0]);
    }
}