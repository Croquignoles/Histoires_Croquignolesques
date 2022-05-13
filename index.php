<?php if (!isset($_SESSION)) {
  session_start();
} 
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Histoire Croquignolesques</title>
</head>

<body>
  <?php

  require_once("includes/connect.php");
  if (!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php");
  else
    require_once("includes/navbar.php");

  //Requête qui retourne toutes les histoires
  $maRequete = "SELECT * FROM histoires";
  $response = $BDD->query($maRequete);
  $nbhistoire = $response->rowCount(); ?>
  <!-- Message d'introduction -->
  <div class="container">
    <header>
      <h1 class="center">Bienvenue sur le site Croquignolerie !</h1>
      <h5 class="def"> <em>Croquignolesque (adjectif) : de Croquignol, personnage de bande dessinée. <br />
          Ridicule, risible.</em></h5>
      <div class="well" style="background-color: #D5F5E3;">
        <h4 class="center">Ce site va vous donner l'opportunité d'incarner un personnage et parcourir des histoires plus rocambolesques les unes que les autres.
          <br />
          Veillez à vous connecter pour pouvoir accéder aux histoires. <br />
          Si vous êtes un administrateur, vous pourrez aussi les créer ou les modifier vous même ! <span class="glyphicon glyphicon-thumbs-up"> </span>
        </h4>
    </header>
    </nav>
    <!-- Carousel qui affiche les histoires et permet d'aller y jouer -->
    <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
      <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
        <!-- Détermine le nombre d'indicateurs de slides selon le nombre d'histoires visibles -->
        <?php $maRequete = "SELECT * FROM histoires";
        $response = $BDD->query($maRequete);
        $tab = $response->fetchAll();
        $j = 1;
        foreach ($tab as $key => $ligne) {
          $hidden = $ligne['isHidden'];
          if ($hidden == 0) {
        ?>
            <li data-slide-to="<?= $j ?>" data-target="#carousel-example-generic" class=""></li>
        <?php
            $j = $j + 1;
          }
        }
        ?>
      </ol>

      <div class="carousel-inner">
        <!-- Slide d'accueil qui n'est pas une histoire -->
        <div class="item active">
          <img alt="First slide" src="images/choix.jpg" style=" width:100%; height: 600px !important;">
        </div>
        <?php
        //Requête qui retourne toutes les histoires et leurs variables associées
        $maRequete = "SELECT * FROM histoires";
        $response = $BDD->query($maRequete);
        $tab = $response->fetchAll();
        $i = 1;
        foreach ($tab as $key => $ligne) {
          $id = $ligne["id_histoire"];
          $title = $ligne["nom_histoire"];
          $des_courte = $ligne["description_histoire"];
          $isHidden = $ligne["isHidden"];
          $image = $ligne["image_histoire"];
          $i = $i + 1 ?>
          <!-- Affichage des histoires seulement si elles sont définies comme visibles -->
          <?php if ($isHidden == 0) { ?>
            <div class="item">
              <!-- Image de couverture à taille fixe -->
              <img alt="slide n°<?= $i ?> : couverture de <?= $title ?>" src="images/<?= $image ?>" style=" width:100%; height: 600px !important;">
              <div class="carousel-caption d-md-block">              
                <!-- Titre et description -->
                <p><span class="badge badge-secondary">" <?= $title ?> " : <?= $des_courte ?></span></p>
                <?php if (isset($_SESSION['user'])) {?>
                    <!-- Bouton de redirection vers le jeu -->
                    <a href="histoire.php?story=<?= $title ?>&id=<?= $id ?>" class="btn btn-default" role="button"> Je joue !</a>
                <?php }
                } ?>
                </br>
              </div>
            </div>
        <?php
          }
        ?>
        <!--Boutons directionnels du carousel-->
        <a data-slide="prev" href="#carousel-example-generic" class="left carousel-control">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a data-slide="next" href="#carousel-example-generic" class="right carousel-control">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
    </br>
    </br>
</body>

</html>


<?= include("includes/footer.php"); ?>

</div>

<!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>