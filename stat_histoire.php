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
require_once("includes/connect.php");
$maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id_histoire";

$response = $BDD->query($maRequete1);
$ligne = $response->fetch();
$id = $ligne["id_histoire"];
$nbParties = $ligne["nb_parties"];
$nbVictoires=$ligne["nb_victoires"];
$nbEchecs=$ligne["nb_echecs"];



// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
if(!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php"); 
else 
    require_once("includes/navbar.php");
    ?>
<div>
    
<p><strong>Nombre de partie jouées :</strong> <?=$nbParties?></p>
<p><strong>Nombre de victoires :</strong> <?=$nbVictoires?></p>
<p><strong>Nombre d'échecs :</strong> <?=$nbEchecs?></p>
<p><strong>Pourcentage de victoire :</strong> <?php
if($nbVictoires+$nbEchecs==0)
{
    ?> 0 %<?php
}
else 
{
    $nbVictoires/($nbVictoires+$nbEchecs) ;?> %<?php
}
    ?></p>


</div>
    <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>