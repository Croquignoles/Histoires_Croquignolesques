<?php if (!isset($_SESSION)) {
    session_start();
}
$id_histoire = $_GET['id'];
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoire Croquignolesques</title>
</head>

<body>
    <?php
    require_once("includes/connect.php");
    //Requête retournant la ligne de la table histoire associée à l'histoire choisie par l'utilisateur 
    $maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id_histoire";
    $response = $BDD->query($maRequete1);
    $ligne = $response->fetch();
    $id = $ligne["id_histoire"];
    $nbParties = $ligne["nb_parties"];
    $nbVictoires = $ligne["nb_victoires"];
    $nbEchecs = $ligne["nb_echecs"];


    if (!empty($_SESSION['user']))
        require_once("includes/navbar_connected.php");
    else
        require_once("includes/navbar.php");
    ?>

    <!-- Calcul et affichage des statistiques de l'histoire -->
    <div>
        <p class="center"><strong>Nombre de partie jouées :</strong> <?= $nbParties ?></p>
        <p class="center"><strong>Nombre de victoires :</strong> <?= $nbVictoires ?></p>
        <p class="center"><strong>Nombre d'échecs :</strong> <?= $nbEchecs ?></p>
        <p class="center"><strong>Pourcentage de victoire :</strong> 
        <?php
            if ($nbVictoires + $nbEchecs == 0) {
            ?> 0 %<?php
            } else {
            echo ($nbVictoires / ($nbVictoires + $nbEchecs)) * 100; ?> %<?php
            }
            ?></p>


    </div>
    <?= include("includes/footer.php"); ?>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>