<?php if(!isset($_SESSION)){
    session_start();
}?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Croquignolerie</title>
</head>
<body>
        <?php include("includes/navbar.php");
        ?>


<div class="container">
    <h2 class="text-center">Inscription</h2>
    <!-- Formulaire d'inscription -->
        <div class="well">
            <form class="form-signin form-horizontal" role="form" action="traitesignin.php" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input type="text" name="login" class="form-control" placeholder="Choissisez votre login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="password" class="form-control" placeholder="Choisissez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="password_check" class="form-control" placeholder="Confirmez votre mot de passe" required>
                    </div>
                </div>
                <!-- Formulaire radio pour déterminer le type d'utilisateur -->
                <div class="form-check">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input class="form-check-input" type="radio" name="choixAdmin" id="isNotAdmin" value="no" checked>
                        <label class="form-check-label" for="isNotAdmin">
                        Utilisateur classique
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input class="form-check-input" type="radio" name="choixAdmin" id="isAdmin" value="yes">
                        <label class="form-check-label" for="isAdmin">
                        Administrateur
                        </label>
                    </div>
                </div>
                <!-- Bouton de confirmation -->
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> S'inscrire </button>
                    </div>
                </div>
            </form>
        </div>
</div>

<?= include("includes/footer.php"); ?>
</div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>