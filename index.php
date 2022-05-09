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
<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
      <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
        <li data-slide-to="1" data-target="#carousel-example-generic" class=""></li>
        <li data-slide-to="2" data-target="#carousel-example-generic" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img alt="First slide" data-src="holder.js/900x500/auto/#777:#555/text:First slide" src="images/defonce.jpg">
        </div>
        <div class="item">
          <img alt="Second slide" data-src="holder.js/900x500/auto/#666:#444/text:Second slide" src="images/defonce.jpg">
        </div>
        <div class="item">
          <img alt="Third slide" data-src="holder.js/900x500/auto/#555:#333/text:Third slide" src="images/defonce.jpg">
        </div>
      </div>
      <a data-slide="prev" href="#carousel-example-generic" class="left carousel-control">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a data-slide="next" href="#carousel-example-generic" class="right carousel-control">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
</div>
</body>
</html>

                  
        <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>