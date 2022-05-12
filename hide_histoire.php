<?php if (!isset($_SESSION)) {
    session_start();

    include("includes/connect.php");
    include("includes/functions.php");

    $id_histoire = $_GET['id'];

    //Mise à jour de la BDD par appel à la fonction hideHistoire
    if (isset($_POST['cacher'])) {
        hideHistoire($BDD, $id_histoire, 1);
    }
    if (isset($_POST['reveler'])) {
        hideHistoire($BDD, $id_histoire, 0);
    }
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
    //Requête donnant accès à la ligne de la table histoire correspondant à l'histoire choisie par l'utilisateur 
    $req = "SELECT * FROM histoires WHERE id_histoire=$id_histoire";
    $rep = $BDD->query($req);
    $ligne = $rep->fetch();
    $isHidden = $ligne["isHidden"];

    require_once("includes/connect.php");
    if (!empty($_SESSION['user']))
        require_once("includes/navbar_connected.php");
    else
        require_once("includes/navbar.php");
    ?>

    <div class="container">

        <?php
        if ($isHidden == 0) {
        ?>

        <!--Bouton qui au clic cache ou fait réapparaître une histoire -->

            <article>
                <form class="center" method="post">
                    <input class="btn btn-warning" type="submit" name="cacher" value="Cacher cette histoire" />
                </form>

            </article>
        <?php
        
        } else {

        ?>
            <article>
                <form class="center" method="post">
                    <input class="btn btn-success" type="submit" name="reveler" value="Rendre visible cette histoire" />
                </form>
            </article>
        <?php
        }
        ?>

        <!--Bouton de redirection vers la page de gestion des histoires-->
        </br>
        <div class="text-center">
            <a href="all_histoires_admin.php?id=<?= $id_histoire ?>" class="btn btn-info" role="button"> Retour à la gestion des histoires</a>
        </div>
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