<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/30ae2add45.js" ></script>
<div class="w-3/5 mx-auto rounded shadow-lg p-8 bg-white flex flex-col gap-8">

    <div>
        <h1 class="text-4xl font-black text-center"><?php echo $_SESSION["recipe"]['nom']?> </h1>
    </div>

    <div class="w-3/4 mx-auto">
        <div class="rounded-lg mx-auto">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION["recipe"]['image']); ?>"
                class="block mx-auto w-1/2" />

            <ul class="flex gap-8 justify-center">
                <li class="font-thin"><i class="fa-solid fa-hourglass-half text-primary text-lg"></i>
                    <?php echo $_SESSION["recipe"]['temps_preparation']?></li>
                <li class="font-thin"><i class="fa-solid fa-dumbbell text-primary text-lg"></i>Niveau de
                    difficulté: <?php echo $_SESSION["recipe"]['difficulte'] ?>
                </li>
                <li class="font-thin"><i class="fa-solid fa-piggy-bank text-primary text-lg"></i><?php echo $_SESSION["recipe"]['cout']?></li>
            </ul>

            <div class="w-3/4 mx-auto">
                <div class="flex gap-4 mx-auto items-center">
                    <hr class="bg-primary w-full h-1">
                    <h2 class="text-lg font-bold">Ingrédients</h2>
                    <hr class="bg-primary w-full h-1">
                </div>
                <ul class="grid grid-cols-4 gap-8 w-4/5 mx-auto">
                    <li>
                        <?php echo str_replace("\n", "</li><li>", $_SESSION["recipe"]['liste_ingredients'])?>
                    </li>
                </ul>
            </div>

            <div class="w-3/4 mx-auto">
                <div class="flex gap-4 mx-auto items-center">
                    <hr class="bg-primary w-full h-1">
                    <h2 class="text-lg font-bold">Préparation</h2>
                    <hr class="bg-primary w-full h-1">
                </div>

                <ul class="flex flex-col gap-8 my-8">
                    <?php echo str_replace("\n", "<br>", $_SESSION["recipe"]['instructions'])?>
                </ul>
            </div>
            <!-- Commentaires -->
            <div class="w-3/4 mx-auto">
                <div class="flex gap-4 mx-auto items-center">
                    <hr class="bg-primary w-full h-1">
                    <h2 class="text-lg font-bold">Commentaires</h2>
                    <hr class="bg-primary w-full h-1">
                </div>
                <ul class="flex flex-col gap-8 my-8">
                    <?php
                    foreach( $_SESSION['commentaires'] as $row ) {
                        ?>
                        <li class="comm">
                            <div class="row">
                                <div class="column">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['photo'])?>" id="avatar-preview-comm" alt="avatar">
                                </div>
                                <div class="column">
                                    <p class="pseudo"><?php echo $row['auteur']; ?><date><?php echo $row['date']; ?></date>
                                    </p>
                                    <p class="star"><span><?php
                                    for ($i = 0; $i < $row['note']; $i++) {
                                        echo '★';
                                    }
                                    ?></span><?php
                                    for ($i = 0; $i < 5-$row['note']; $i++) {
                                        echo '★';
                                    }
                                    echo ' ' . $row['titre']; ?></p>
                                    <p class="comm-text"><?php echo str_replace("\n", "<br>", $row['commentaire']); ?></p>
                                    <?php
                                    if (isset($_SESSION['userAdmin']) and $_SESSION['userAdmin'] == true){
                                        ?>
                                        <form action="/recipe/supprime_comm" method="post">
                                            <button class="supprimer-submit" name="id_comm" value="<?php echo $row['id_comm']?>">Supprimer</button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
                if (isset($_SESSION["utilisateur"])){
                    ?>
                    <div class="comment-session">
                        <div class="comment-box">
                            <form action="/recipe/ajoute_comm" method="post">
                                <div class="row">
                                    <div class="user">
                                        <div class="image">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['utilisateur_pp'])?>">
                                        </div>
                                        <div class="column">
                                            <div class="name"><?php echo $_SESSION['utilisateur']?></div>
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    <input type="radio" name="rating" value="1" id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" value="2" id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" value="3" id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" value="4" id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" name="rating" value="5" id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <textarea class="comment-title" name="comment-title" placeholder="Titre"></textarea>
                                <textarea class="comment" name="comment" placeholder="Commentaire"></textarea>
                                <input type="number" name="id_recette" value="<?php echo $_SESSION["id_recette"]?>" hidden>
                                <button class="comment-submit">Commenter</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                else{
                    echo "Vous devez être connecter pour pouvoir ajouter un commentaire";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <ul class="w-3/4 mx-auto flex gap-4 font-bold justify-end">
        <li>Source : </li>
        <li><a class="underline">Biodélice</a></li>
        <li><a class="underline">Marmiton</a></li>
    </ul>
</div>