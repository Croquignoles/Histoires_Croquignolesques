<?php  
session_start();
$id = $_GET["id"];
$titrehistoire = $_GET["story"];
?>

<!doctype html>
<html> 

<?php include("includes/connect.php"); 

$maRequete = "SELECT * FROM pages WHERE id_histoire = $id AND id_page_depart IS NULL";
 
    $response = $BDD->query($maRequete);
    $ligne = $response->fetch();
    $idpage = $ligne["id_pages"];
    $texte = $ligne["text_page"];
    $idhistoire = $ligne["id_histoire"];
    $idpadedepart = $ligne["id_page_depart"];
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

</nav>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-7 col-sm-5">
                    <p><small><?= $texte?></small></p>
                </div>
                <?php
                $maRequete2 = "SELECT * FROM pages WHERE id_histoire = $id AND id_page_depart = $idpage";
                $response2 = $BDD->query($maRequete2);
                $nbchoix = $response2->rowCount();
                foreach ($response2 as $ligne2)
                {
                    $idpagechoix = $ligne2["id_pages"];
                    $textechoix = $ligne2["text_page"];
                    $idhistoirechoix = $ligne2["id_histoire"]; ?>

                    <div class="col-sm-3">
                    <p><small><?= $textechoix?></small></p>
                    <a href="page.php?story=<?=$title?>&idpage=<?=$idpagechoix?>" class="btn btn-info" role="button"> J'y vais !</a>
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
