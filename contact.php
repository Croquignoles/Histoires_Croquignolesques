<?php session_start(); ?>

<!-- Page du site qui donne accès à nos contacts (mais en fait c'est une blague) -->
<!doctype html>
<html>

<?php include("includes/connect.php"); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Croquignolerie</title>
</head>

<body>

    <?php
    if (!empty($_SESSION['user']))
        include("includes/navbar_connected.php");
    else
        include("includes/navbar.php");
    ?>
    <div class="container">
        <div class="text-center">
            <img src="images/lesdeuxzozos.png" class="rounded" alt="Photo de Lorinda et Hugo">
            </br>
            <h3>En fait non vous pouvez pas nous contacter aha prank </h3>
            </br>

            </br>

        </div>
    </div>

    <?= include("includes/footer.php"); ?>


    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>