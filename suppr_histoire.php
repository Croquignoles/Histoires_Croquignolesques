<?php if (!isset($_SESSION)) {
    session_start();

    include("includes/connect.php");
    $id_histoire = $_GET['id'];
    //Requête de suppression de l'histoire chosiie par l'utilisateur 
    $requete = 'DELETE FROM histoires WHERE id_histoire=:id';
    $response = $BDD->prepare($requete);
    $response->execute(array(
        'id' => $id_histoire
    ));
} ?>

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
    if (!empty($_SESSION['user']))
        require_once("includes/navbar_connected.php");
    else
        require_once("includes/navbar.php");
    ?>

    <div class="container">
        <!-- Message d'explication -->
        <article>
            <h4 class="center"> Votre histoire vient d'être supprimée </h4>
            <!-- Bouton de retour -->
            <div class="center">
                <a href="all_histoires_admin.php?id=<?= $id_histoire ?>" class="btn btn-info" role="button"> Retour à la gestion des histoires</a>
            </div>
        </article>
        </br>
        </br>

    </div>

    <?= include("includes/footer.php"); ?>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>