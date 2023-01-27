<script src="https://cdn.tailwindcss.com"></script>
<nav>
    <div class="formRecherche">
        <!-- Formulaire de recherche -->
        <form method="get" action="index.php?url=Recherche" id="form">
            <input type="text" name="query" placeholder="Rechercher une recette">
            <input type="text" name="url" value="Recherche" id="url1">
            <input type="submit" value="Rechercher" form="form">
        </form>
    </div>
    <div class="formTri">
        <div class="formTri1">
            <form action="index.php?url=Tri" method="get">
                <input type="submit" name="sortCout" value="Trier par coût">
                <input type="text" name="url" value="Tri" id="url2">
            </form>
        </div>
        <div class="formTri2">
            <form action="index.php?url=Tri" method="get">
                <input type="submit" name="sortDifficulte" value="Trier par difficulte">
                <input type="text" name="url" value="Tri" id="url3">
            </form>
        </div>
    </div>



    <div class="divInput">
    <?php if (isset($_SESSION['userAdmin'])) {
    echo'<input type="button" value="Créer recette" onclick="versCreation()" class="btnConnexion">';
    }?>
    <input type="button" value="Connexion" onclick="versConnexion()" class="btnConnexion">
    <input type="button" value="Admin" onclick="versAdmin()" class="btnConnexion">
    </div>
</nav>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Compte créé
                </th>
                <th scope="col" class="px-6 py-3">
                    Dernière connexion
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($_SESSION['users_list'] as $row){
                ?>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['nom']?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $row['email']?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                        if ($row['admin'] == 1) echo "Oui";
                        else echo "Non";
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['date_premiere_connexion']?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['date_derniere_connexion']?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="<?php echo "/admin/supprimerUtilisateur?=".$row['id']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

