<?php 
if(!isset($_SESSION)){
    session_start();
} 
$idpage = $_GET["idpage"];
$titrehistoire = $_GET["story"];
$idhistoire = $_GET["idstory"];
$idPageRetour=$_GET['idpageretour'];
$matricule=$_SESSION['matricule'];
?>

<!doctype html>
<html> 

<?php include("includes/connect.php"); 
    include("functions.php");

$maRequete = "SELECT * FROM pages WHERE id_histoire = $idhistoire AND id_pages = $idpage";
                $response = $BDD->query($maRequete);
                $ligne = $response->fetch();
                    $textechoix1 = $ligne["text_page"];
                    $descourte1 = $ligne["desc_courte"];
                    $impasseOuVictoire=$ligne ["est_victoire_echec"];


$reqHistoire="SELECT * FROM histoires WHERE id_histoire=$idhistoire";
    $repHistoire=$BDD->query($reqHistoire);
    $ligneHistoire=$repHistoire->fetch();
    $echecs=$ligneHistoire["nb_echecs"];
    $victoires=$ligneHistoire["nb_victoires"];     
    
$maRequete2 = "SELECT * FROM liens_pages WHERE id_histoire = $idhistoire AND id_page_depart = $idpage";
    $response2 = $BDD->query($maRequete2);
    $nbchoix = $response2->rowCount();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title> Histoires_Croquignolesques </title>
</head>

<body>

<?php 
if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php"); 
?>
<div class="container">
<div class="jumbotron">
            <div class="row">
                <div class="col-1">
                    <p><?= $textechoix1?></p>
                </div>
                <?php
                if($impasseOuVictoire==0)
                {
                   if(isset($idPageRetour))
                   {
                    ?><div><h3 class="text-center">Au vu de la situation, mon choix n'était peut être pas le bon, mon moral en prend un coup et je décide de rebrousser chemin.</h3></div>
                    <article class="container">
                        <div class="text-center">
                            <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=$idPageRetour?>" class="btn btn-danger" role="button" > Retour en arrière </a>
                        </div>
                    </article>
                    <?php
                   }
                   else
                   {
                    ?><div><h3 class="text-center">Au vu de la situation, mon choix n'était peut être pas le bon, mon moral en prend un coup et je décide de rebrousser chemin.</h3></div>
                    <article class="container">
                        <div class="text-center">
                            <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=1?>" class="btn btn-danger" role="button" > Retour en arrière </a>
                        </div>
                    </article>
                    <?php
                   }
                   
                
                addEchecFunction($BDD,$idhistoire,$echecs);
                    
                }
                elseif($impasseOuVictoire==2)
                {
                    ?><div> <h3 class="text-center">Oh mais, ne serait-ce pas la victoire que j'apperçois là ? J'ai toujours su que j'étais destiné à de grandes choses !</h3></div>
                    <article class="container">
                    <div class="text-center">
                        <a href="index.php" class="btn btn-success" role="button" > Retour au choix des histoires </a>
                    </div>
                </article>
                    <?php
                        addVictoireFunction($BDD,$idhistoire,$victoires);
                }
                else
                {
                    
                    foreach ($response2 as $ligne2)
                    {
                        $idpagechoix = $ligne2["id_page_arrivee"];
                        $idLien=$ligne2["id_lien"];
                        $maRequete3 = "SELECT * FROM pages WHERE id_pages = $idpagechoix";
                        $response3 = $BDD->query($maRequete3);
                        $ligne3 = $response3->fetch();
                        
                        $descourte = $ligne3["desc_courte"];
                        ?>

                        <div class="col-sm-<?=$nbchoix?>">
                        <p><small><?= $descourte?></small></p>
                        <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=$idpagechoix?>&idpageretour=<?=$idpage?>" class="btn btn-info" role="button"> J'y vais !</a>
                    </div>
                    <?php
                    }
                    $reqUpdatePartie=$BDD->prepare("UPDATE partie_en_cours SET id_histoire , id_page_arret , resume_partie WHERE matricule=" );
                
                }  ?>

            </div>
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
