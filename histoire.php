<?php if(!isset($_SESSION)){
    session_start();
    

}
if(isset($_SESSION['matricule'])){
$matricule=$_SESSION['matricule'];}
?>
<!doctype html>
<html> 

<?php include("includes/connect.php"); 
$id = $_GET["id"];
$reqVerifPartie="SELECT * FROM partie_en_cours WHERE matricule=$matricule";
$repVerifPartie=$BDD->query($reqVerifPartie);
$ligneVerifPartie=$repVerifPartie->fetch();
$nbPartiesJoueur=$repVerifPartie->rowcount();
if($nbPartiesJoueur==0)
{
    $startHistoire="INSERT INTO partie_en_cours (id_histoire,id_page_arret,resume_partie,matricule) 
    VALUES (:id_histoire,:id_page_arret,:resume_partie,:matricule)";
    $repHistoire=$BDD->prepare($startHistoire);
    $repHistoire->execute(array(
        ':id_histoire'=>$idhistoire,
        ':id_page_arret'=>1,
        'resume_partie'=> $texte,
        'matricule'=> $_SESSION['matricule'],
    ));
}
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
    

$infoPartie=$BDD->query("SELECT * FROM partie_en_cours WHERE matricule=$matricule");
    $lignePartie=$infoPartie->fetch();
    $idPartie=$lignePartie['id_partie'];
    $idHistoireEnCours=$lignePartie['id_histoire'];
    $pdv=$lignePartie['nb_pdv'];
    $pageArret=$lignePartie['id_page_arret'];
    $resume=$lignePartie['resume_partie'];

$checkImpasseDepart=$BDD->query("SELECT * from pages WHERE id_pages=$pageArret");
    $ligneCheck=$checkImpasseDepart->fetch();
    $impasseOuPas=$ligneCheck['est_victoire_echec'];
    $departOuPas=$ligneCheck['is_first_page'];

$titleReprendreHistoire=$BDD->query("SELECT*from histoires where id_histoire=$idHistoireEnCours");
$ligneReprendreHistoire=$titleReprendreHistoire->fetch();
$titleHistoire=$ligneReprendreHistoire['nom_histoire'];
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
    <div class="container">
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
                <a href="firstpage.php?story=<?=$title?>&id=<?=$id?>" class="btn btn-success" role="button" > Let's go !</a>
                </div> 
                
            </div>
            <?php if(!$departOuPas && $impasseOuPas!=2 && $pdv>0)  
                {
                    ?><div class="alert alert-warning" role="alert"> Attention, vous avez déjà une partie en cours, voulez vous <a href="page.php?story=<?=$titleHistoire?>&idstory=<?=$idHistoireEnCours?>&idpage=<?=$pageArret?>" class="alert-link">la reprendre ?</a>  
                    <?php
                }        
                ?>     
                </div>  
        </div>
    </div>

    <?= include("includes/footer.php"); ?>
</div>

<!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>