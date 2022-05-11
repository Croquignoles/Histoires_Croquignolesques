<?php if(!isset($_SESSION)){
    session_start();
    

}
$matricule=$_SESSION['matricule'];
?>
<!doctype html>
<html> 

<?php include("includes/connect.php"); 
$id = $_GET["id"];
$maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id";

    $response = $BDD->query($maRequete1);
    $ligne = $response->fetch();
    $id = $ligne["id_histoire"];
    $title = $ligne["nom_histoire"];
    $des_courte = $ligne["description_histoire"];
    $image = $ligne["image_histoire"];
    $nbParties = $ligne["nb_parties"];
    $nbVictoires=$ligne["nb_victoires"];
    $nbEchecs=$ligne["nb_echecs"];
    $idFirstPage=$ligne["id_first_page"];

$infoPartie=$BDD->query("SELECT * FROM partie_en_cours WHERE matricule=$matricule");
    $lignePartie=$infoPartie->fetch();
    $idPartie=$lignePartie['id_partie'];
    $pdv=$lignePartie['nb_pdv'];
    $pageArret=$lignePartie['id_page_arret'];
    $resume=$lignePartie['resume_partie'];

$checkImpasseDepart=$BDD->query("SELECT * from pages WHERE id_pages=$pageArret");
    $ligneCheck=$checkImpasseDepart->fetch();
    $impasseOuPas=$ligneCheck['est_victoire_echec'];
?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoire - <?= $title ?> </title>
</head>
<body>

<?php 

include("functions.php");

if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php"); 
?>

</nav>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <img class="img-responsive movieImage" src="images/<?= $image ?>" title=<?= $title?> />
                </div>
                <div class="col-md-7 col-sm-5">
                    <h2><?= $title ?></h2>
                    <p><small><?= $des_courte?></small></p>
                </div>
                <div class="col-md-7 col-sm-5">
                <a href="firstpage.php?story=<?=$title?>&id=<?=$id?>" class="btn btn-info" role="button" > Let's go !</a>
                </div> 
                
            </div>
            <?php if($pageArret!=$idFirstPage && $impasseOuPas==1)  
                {
                    ?><div class="alert alert-warning" role="alert"> Attention, vous avez déjà une partie en cours, voulez vous <a href="page.php?story=<?=$title?>&idstory=<?=$id?>&idpage=<?=$pageArret?>" class="alert-link">la reprendre ?</a>  
                    <?php
                }        
                ?>     
                </div>  
        </div>

    <footer class="footer">
    Construit avec swag par lololezigoto, élève de l'<a href="https://www.ensc.fr">ENSC</a>.
</footer></div>

<!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>