<?php if(!isset($_SESSION)){
    session_start();
}
$id_histoire = $_GET['id'];
?>
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
include("includes/connect.php");
// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre


if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php");
?>
</nav>


<article class="container">
            <h1 class="text-center">Bienvenue dans votre interface de modification des histoires, que voulez vous faire ?</h1>
</br>
</br>
<div class="text-center">

                <a href="suppr_histoire.php?id=<?=$id_histoire?>" class="btn btn-danger" role="button" > Supprimer histoire</a>
                </div>

</br>
                <div class="text-center">
                <a href="modif_histoire.php?id=<?=$id_histoire?>" class="btn btn-primary" > Modifier histoire</a>
                </div>
            </br>

                <div class="text-center">
                <a href="stat_histoire.php?id=<?=$id_histoire?>" class="btn btn-info" role="button" > Voir les stats de l'histoire</a>
                </div>
            </br>

                <div class="text-center">
                <a href="hide_histoire.php?id=<?=$id_histoire?>" class="btn btn-success" role="button" > Cacher cette histoire ou la rendre visible </a>
                </div>
</div>

</article>



                  
        <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>