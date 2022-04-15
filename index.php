<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Les deux lignes en dessous c'est quoi ça??-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>MyMovies </title>
</head>
<body>

<?php 
include("includes/connect.php");
// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre


if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php");
?>
    
    <?php $maRequete = "SELECT * FROM histoires";
    $response = $BDD->query($maRequete);
    $nbhistoire = $response->rowCount(); ?>


</nav>
<?php for ($i=1; $i <= $nbhistoire; $i++) { 
    $maRequete = "SELECT * FROM histoires WHERE id_histoire = $i";
    $response = $BDD->query($maRequete);
    $ligne = $response->fetch();
    $id = $ligne["id_histoire"];
    $title = $ligne["nom_histoire"];
    $pages = $ligne["nb_pages"];
    ?>
<article>
                <h3><a class="movieTitle" href="movie.php?id=<?=$id ?>"><?=$title ?></a></h3>
</article>
<?php } ?>
//<p class="movieContent"><?= $des_courte?></p>

                    
        
        <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>