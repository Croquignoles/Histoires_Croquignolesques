<?php  
session_start();
$idpage = $_GET["idpage"];
$titrehistoire = $_GET["story"];
$idhistoire = $_GET["idstory"];
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
                    $idPageDepart=$ligne["id_page_depart"];

$reqHistoire="SELECT * FROM histoires WHERE id_histoire=$idhistoire";
    $repHistoire=$BDD->query($reqHistoire);
    $ligneHistoire=$repHistoire->fetch();
    $echecs=$ligneHistoire["nb_echecs"];
    $victoires=$ligneHistoire["nb_victoires"];                  
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

<div class="jumbotron">
            <div class="row">
                <div class="col-1">
                    <p><?= $textechoix1?></p>
                </div>
                <?php
                if($impasseOuVictoire==0)
                {
                ?><div><h3 class="text-center">Au vu de la situation, mon choix n'était peut être pas le bon, mon moral en prend un coup et je décide de rebrousser chemin.</h3></div>
                <article class="container">
                    <div class="text-center">
                        <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=$idPageDepart?>" class="btn btn-danger" role="button" > Retour en arrière </a>
                    </div>
                </article>
                <?php
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
                $maRequete2 = "SELECT * FROM pages WHERE id_histoire = $idhistoire AND id_page_depart = $idpage";
                $response2 = $BDD->query($maRequete2);
                $nbchoix = $response2->rowCount();
                foreach ($response2 as $ligne2)
                {
                    $idpagechoix = $ligne2["id_pages"];
                    $textechoix = $ligne2["text_page"];
                    $descourte = $ligne2["desc_courte"];
                    
                    

                    ?>

                    <div class="col-sm-<?=$nbchoix?>">
                    <p><small><?= $descourte?></small></p>
                    <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=$idpagechoix?>" class="btn btn-info" role="button"> J'y vais !</a>
                    </div>
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
