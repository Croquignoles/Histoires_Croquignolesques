<!doctype html>
<html> 

<?php include("includes/connect.php"); 
$id = $_GET["id"];
// Dans la requête, on remplace les valeurs issues de variables par des ?
$maRequete = "SELECT * FROM movie WHERE mov_id=$id";
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
$response = $BDD->query($maRequete);
$ligne = $response->fetch();
$titre = $ligne["mov_title"];
$des_courte = $ligne["mov_description_short"];
$des_longue = $ligne["mov_description_long"];
$directeur = $ligne["mov_director"];
$annee = $ligne["mov_year"];
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
<?php include("includes/navbar.php"); ?>
</nav>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <img class="img-responsive movieImage" src="images/<?= $ligne["mov_image"] ?>" title=<?= $ligne["mov_title"]?> />
                </div>
                <div class="col-md-7 col-sm-5">
                    <h2><?= $titre ?></h2>
                    <p> <?= $directeur . ", " . $annee ?></p>
                    <p><small><?= $des_longue?></small></p>
                </h2>
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