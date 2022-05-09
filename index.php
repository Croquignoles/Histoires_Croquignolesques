<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Les deux lignes en dessous c'est quoi ça??-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Histoire Croquignolesques</title>
</head>

<body>
<?php 

require_once("includes/connect.php");
// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
if(!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php"); 
else 
    require_once("includes/navbar.php");
    
    $maRequete = "SELECT * FROM histoires";
    $response = $BDD->query($maRequete);
    $nbhistoire = $response->rowCount(); ?>
<div class="container">
<header>
  <h1 class="center">Bienvenue sur le site Croquignolerie !</h1>
  <h5 class="def"> <em>Croquignolesque (adjectif) : de Croquignol, personnage de bande dessinée. <br/>
  Ridicule, risible.</em></h5>
    <div class="well" style="background-color: #D5F5E3;" >
  <h4 class="center">Ce site va vous donner l'opportunité d'incarner un personnage et parcourir des histoires plus rocamboloesques les unes que les autres.
      <br/>
      Veuillez à vous connecter pour pouvoir accéder aux histoires. <br/>
      Si vous êtes un administrateur, vous pourrez aussi les créer ou les modifier vous même !  <span class ="glyphicon glyphicon-thumbs-up"> </span>
  </h4>
</header>
</nav>

<?php 
    $maRequete = "SELECT * FROM histoires";
    $response = $BDD->query($maRequete);
    $tab = $response->fetchAll();
    foreach ($tab as $key => $ligne) {
        $id = $ligne["id_histoire"];
        $title = $ligne["nom_histoire"];
        $des_courte = $ligne["description_histoire"];
        ?>




<article>
            <?php if(!empty($_SESSION['user'])) {?>
                <div class="well"     >
                <h3><a class="link" href="histoire.php?id=<?=$id?>"><?=$title ?></a></h3>
            <?php 
                echo $des_courte; ?>         
            </div>

                <?php } else {?>
                <h3><?=$title ?></h3>
            <p class="movieContent"><?= $des_courte?></p>

</article>
<?php } 

}?>
</div>

<div class="container">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/defonce.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/defonce.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/defonce.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

                  
        <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>