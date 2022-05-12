<?php session_start(); ?>

<!-- Page du site qui affiche chaque histoire pour rediriger l'utilisateur vers sa page de gestion-->
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

    $maRequete = "SELECT * FROM histoires";
    $response = $BDD->query($maRequete);
    $nbhistoire = $response->rowCount(); ?>

    <div class="container">

        <?php $maRequete = "SELECT * FROM histoires";
        $response = $BDD->query($maRequete);
        $tab = $response->fetchAll();
        foreach ($tab as $key => $ligne) {
            $id = $ligne["id_histoire"];
            $title = $ligne["nom_histoire"];
            $des_courte = $ligne["description_histoire"];
        ?>
            <article>
                <div class="well" style="background-color : #D5F5E3">
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <h3><a style="color : black;" href="gerer_histoire.php?id=<?= $id ?>"><?= $title ?></a></h3>
                    <?php echo $des_courte;
                    } ?>
                </div>
            </article>
        <?php } ?>


        <?= include("includes/footer.php"); ?>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>