<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/30ae2add45.js" ></script>
<?php 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $url = "https://";   
else  
      $url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];
// id = url.split("=")[1];
$id = explode("=", $url)[1];

$bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
$query = $bdd->prepare('SELECT  instructions, nom, image , liste_ingredients, temps_preparation, difficulte, cout FROM recettes WHERE id = :id');
$query->execute(['id' => $id]);

$result = $query->fetch();
$image = $result['image'];
$nom = $result['nom'];
$tempprep = $result['temps_preparation'];
$difficulté = $result['difficulte'];
$cout = $result['cout'];
$listeingr = $result['liste_ingredients'];
$isntructions = $result['instructions'];
//Faire controleur
?>
<div class="w-3/5 mx-auto rounded shadow-lg p-8 bg-white flex flex-col gap-8">
    <ul class="text-sm text-primary flex gap-8 font-black">
        <li><?php echo $nom?></li>
    </ul>

    <div>
        <h1 class="text-4xl font-black text-center"><?php echo $nom?> </h1>
    </div>

    <div class="w-3/4 mx-auto">
        <div class="rounded-lg mx-auto">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>"
                class="block mx-auto w-1/2" />

            <ul class="flex gap-8 justify-center">
                <li class="font-thin"><i class="fa-solid fa-hourglass-half text-primary text-lg"></i>
                    <?php echo $tempprep?></li>
                <li class="font-thin"><i class="fa-solid fa-dumbbell text-primary text-lg"></i>Niveau de
                    difficulté: <?php echo $difficulté ?>
                </li>
                <li class="font-thin"><i class="fa-solid fa-piggy-bank text-primary text-lg"></i><?php echo $cout?></li>
            </ul>

            <div class="w-3/4 mx-auto">
                <div class="flex gap-4 mx-auto items-center">
                    <hr class="bg-primary w-full h-1">
                    <h2 class="text-lg font-bold">Ingrédients</h2>
                    <hr class="bg-primary w-full h-1">
                </div>
                <ul class="grid grid-cols-4 gap-8 w-4/5 mx-auto">
                    <?php echo $listeingr?>
                </ul>
            </div>

            <div class="w-3/4 mx-auto">
                <div class="flex gap-4 mx-auto items-center">
                    <hr class="bg-primary w-full h-1">
                    <h2 class="text-lg font-bold">Préparation</h2>
                    <hr class="bg-primary w-full h-1">
                </div>

                <ul class="flex flex-col gap-8 my-8">
                    <?php echo $isntructions?>
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
                    $O_bdd = new PDO('mysql:host=mysql-thesavorist.alwaysdata.net;dbname=thesavorist_site', '295285', '*OnadesnotesIncr13*');
                    $req = $O_bdd->prepare('SELECT auteur,note,titre,commentaire,CAST(created_at AS date) as date,photo FROM appreciations,utilisateurs WHERE id_recette = ? AND auteur=nom ORDER BY created_at DESC');
                    $req->execute(array($id));
                    $result = $req->fetchAll();
                    $img = $O_bdd->prepare('Select photo from utilisateurs where nom = ?');
                    $img->execute(array($_SESSION['utilisateur']));
                    $img = $img->fetch();

                    foreach( $result as $row ) {
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
                                    <p><?php echo str_replace("\n", "<br>", $row['commentaire']); ?></p>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="comment-session">
                    <div class="comment-box">
                        <form action="/recipe/ajoute_comm" method="post">
                            <div class="row">
                                <div class="user">
                                    <div class="image">
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($img['photo'])?>">
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
                            <input type="number" name="id_recette" value="<?php echo $id?>" hidden>
                            <button class="comment-submit">Commenter</button>
                        </form>
                    </div>
                </div>
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