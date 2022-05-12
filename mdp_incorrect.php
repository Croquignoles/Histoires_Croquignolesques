<?php if (!isset($_SESSION)) {
    session_start();
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

<!-- Affichage d'un message d'explication si le mot de passe est mal confirmé -->
    <div class="container">
        <article>
            <h4 class="center"> Le mot de passe n'a pas pu être confirmé. Entrez bien le même mot de passe dans le champs de vérification ! </h4>
            <div class="center">
                <!-- Bouton de redirection -->
                <a href="signin.php" class="btn btn-primary" role="button"> Retour à la page d'inscription</a>
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