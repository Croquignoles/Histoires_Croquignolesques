<?php if(!isset($_SESSION)){
    session_start();

include("includes/connect.php");
include("ajax.js");
include("ajax.php");
$id_histoire = $_GET['id'];


}?>

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
$req="SELECT * FROM histoires WHERE id_histoire=$id_histoire";
$rep=$BDD->query($req);
$ligne=$rep->fetch();
$isHidden=$ligne["isHidden"];
require_once("includes/connect.php");
// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
if(!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php"); 
else 
    require_once("includes/navbar.php");
 ?>
    
<div class="container">

<?php 
if($isHidden==0)
{
    ?>
    <article>
    <div class="text-center">
        <a href="index.php" onclick=myAjax() class="btn btn-warning" role="button" > Cacher cette histoire </a>
    </div>
    </article>
    <?php
}
else
{
    ?>
    <article>
    <div class="text-center">
        <a href="index.php" class="btn btn-info" role="button" > Rendre visible cette histoire </a>
    </div>
    </article>
    <?php
}
?>



<a href="all_histoires_admin.php?id=<?=$id_histoire?>" class="btn btn-info" role="button" > Retour à la gestion des histoires</a>



</div>


                  
        <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>