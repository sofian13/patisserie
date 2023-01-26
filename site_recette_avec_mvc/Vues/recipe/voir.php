<div class="w-3/5 mx-auto rounded shadow-lg p-8 bg-white flex flex-col gap-8">
  <ul class="text-sm text-primary flex gap-8 font-black">
    <li>Brownies au noix de pécan</li>
  </ul>

  <div>
    <h1 class="text-4xl font-black text-center">Brownies au noix de pécan</h1>
  </div>

  <div class="w-3/4 mx-auto">
    <div class="rounded-lg bg-black mx-auto">
      <img src="https://picsum.photos/400" class="block mx-auto w-1/2" />
    </div>
    <ul class="flex gap-4 overflow-auto mt-4 pb-4">
    </ul>
  </div>

  <ul class="flex gap-8 justify-center">
    <li class="font-thin"><i class="fa-solid fa-hourglass-half text-primary text-lg"></i> 15 minutes</li>
    <li class="font-thin"><i class="fa-solid fa-dumbbell text-primary text-lg"></i> facile</li>
    <li class="font-thin"><i class="fa-solid fa-piggy-bank text-primary text-lg"></i> 15 minutes</li>
  </ul>

  <div class="w-3/4 mx-auto">
    <div class="flex gap-4 mx-auto items-center">
      <hr class="bg-primary w-full h-1">
      <h2 class="text-lg font-bold">Ingrédients</h2>
      <hr class="bg-primary w-full h-1">
    </div>
    <ul class="grid grid-cols-4 gap-8 w-4/5 mx-auto">
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/201" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/202" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/203" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/204" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/205" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/206" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
      </li>
      <li class="flex flex-col items-center">
        <img src="https://picsum.photos/207" class="rounded-lg shadow-xl" />
        <span class="font-bold mt-2">120g</span>
        <span>Farine</span>
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
      <li>
        <span class="text-5xl font-bold">1</span>
        <p>Réchauffez les blinis selon l’indication du paquet. Etalez-les légèrement à l’aide d’un rouleau à pâtisserie.</p>
      </li>
      <li>
        <span class="text-5xl font-bold">2</span>
        <p>Réchauffez les blinis selon l’indication du paquet. Etalez-les légèrement à l’aide d’un rouleau à pâtisserie.</p>
      </li>
      <li>
        <span class="text-5xl font-bold">3</span>
        <p>Réchauffez les blinis selon l’indication du paquet. Etalez-les légèrement à l’aide d’un rouleau à pâtisserie.</p>
      </li>
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
      $req = $O_bdd->prepare('SELECT auteur,note,titre,commentaire,CAST(created_at AS date) as date FROM appreciations WHERE id_recette = 41 ORDER BY created_at DESC');
      $req->execute();
      $result = $req->fetchAll();
      foreach( $result as $row ) {
        ?>
        <li class="comm">
          <div class="row">
            <div class="column">
              <img src="https://media.discordapp.net/attachments/885515822817234954/1063397423428403230/pngegg.png?width=581&height=581" id="avatar-preview-comm" alt="avatar">
            </div>
            <div class="column">
              <p class="pseudo"><?php echo $row['auteur']; ?><date><?php echo $row['date']; ?></date></p>
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
        <form action="" method="post">
        <div class="row">
          <div class="user">
            <div class="image">
              <img src="https://media.discordapp.net/attachments/885515822817234954/1063397423428403230/pngegg.png?width=581&height=581">
            </div>
            <div class="column">
              <div class="name">RAYTEK</div>
              <div class="rating-css">
                <div class="star-icon">
                  <input type="radio" name="rating" id="rating1">
                  <label for="rating1" class="fa fa-star"></label>
                  <input type="radio" name="rating" id="rating2">
                  <label for="rating2" class="fa fa-star"></label>
                  <input type="radio" name="rating" id="rating3">
                  <label for="rating3" class="fa fa-star"></label>
                  <input type="radio" name="rating" id="rating4">
                  <label for="rating4" class="fa fa-star"></label>
                  <input type="radio" name="rating" id="rating5">
                  <label for="rating5" class="fa fa-star"></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <textarea class="comment-title" name="comment-title" placeholder="Titre"></textarea>
        <textarea class="comment" name="comment" placeholder="Commentaire"></textarea>
        <button class="comment-submit">Commenter</button>
        </form>
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