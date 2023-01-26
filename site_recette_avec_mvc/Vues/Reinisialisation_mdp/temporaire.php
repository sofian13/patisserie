<form method="post">
    <input type="password" name="mdp" required>
    <input type="password" name="mdpverif" required>
    <button name="btnConfirmation">Confirmer</button>
</form>
<?php
if($_POST){
    $O_controRe = new ControleurReinisialisation_mdp();
    $O_controRe ->changeMdpAction($_POST['mdp'],$_POST['mdpverif'], $_GET['token']);
}
?>