function openLoginPage() {
    document.querySelector(".reg").classList.remove("show-page");
    document.querySelector(".Connexion").classList.add("show-page");
    document.getElementById("Connexion-action").classList.add("show");
    document.getElementById("reg-action").classList.remove("show");
}
function openRegPage() {
    document.querySelector(".reg").classList.add("show-page");
    document.querySelector(".Connexion").classList.remove("show-page");
    document.getElementById("reg-action").classList.add("show");
    document.getElementById("Connexion-action").classList.remove("show");
  }