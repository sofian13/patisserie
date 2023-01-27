<form method="post">
    <input type="password" name="mdp" class="mdpreset" required>
    <input type="password" name="mdpverif" class="mdpreset" required>
    <button name="btnConfirmation">Confirmer</button>
</form>
<?php
if($_POST){
    $O_controRe = new ControleurReinisialisation_mdp();
    $O_controRe ->changeMdpAction($_POST['mdp'],$_POST['mdpverif'], $_GET['token']);
}
?>