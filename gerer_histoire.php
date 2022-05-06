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
            <h1 class="text-center">Bienvenue dans votre interface de mofication des histoires, que voulez vous faire ?</h1>
</br>
</br>
   
            <form class="form-horizotal" role="form" enctype="multipart/form-data" action="suppr_histoire.php?id=<?=$id_histoire?>" method="post">
            <div class="form-group">
                <div class="text-center">
                <a href="suppr_histoire.php?id=<?=$id_histoire?>" class="btn btn-info" role="button" > Supprimer histoire</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="modif_histoire.php?id=<?=$id_histoire?>" method="post">
            <div class="form-group">
                <div class="text-center">
                <a href="modif_histoire.php?id=<?=$id_histoire?>" class="btn btn-primary" role="button" > Modifier histoire</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="stat_histoire.php?id=<?=$id_histoire?>" method="post">
            <div class="form-group">
                <div class="text-center">
                <a href="stat_histoire.php?id=<?=$id_histoire?>" class="btn btn-danger" role="button" > Statistique histoire</a>
                </div>
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