<?php  
session_start();
$idpage = $_GET["idpage"];
echo $idpage;
$titrehistoire = $_GET["story"];
$idhistoire = $_GET["idstory"];
?>

<!doctype html>
<html> 

<?php include("includes/connect.php"); 

$maRequete = "SELECT * FROM pages WHERE id_histoire = $idhistoire AND id_pages = $idpage";
                $response = $BDD->query($maRequete);
                $ligne = $response->fetch();
                    $textechoix1 = $ligne["text_page"];
                    $descourte1 = $ligne["desc_courte"];
                    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>MyMovies - <?= $titre ?> </title>
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
