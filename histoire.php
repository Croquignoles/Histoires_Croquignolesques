<?php if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['matricule'])) {
    $matricule = $_SESSION['matricule'];
}
?>

<?php include("includes/connect.php");
//Requête donnant accès aux informations de partie relative à l'utilisateur connecté
$id = $_GET["id"];
$reqVerifPartie = "SELECT * FROM partie_en_cours WHERE matricule=$matricule";
$repVerifPartie = $BDD->query($reqVerifPartie);
$ligneVerifPartie = $repVerifPartie->fetch();
$nbPartiesJoueur = $repVerifPartie->rowcount();

$textePremierPage=$BDD->query("SELECT * FROM pages WHERE is_first_page=1 AND id_histoire=$id");
$ligneTextePremierePage=$textePremierPage->fetch();
$texte=$ligneTextePremierePage['text_page'];
//Enrichissement de la BDD s'il commence une nouvelle partie
if ($nbPartiesJoueur == 0) {
    $startHistoire = "INSERT INTO partie_en_cours (id_histoire,id_page_arret,resume_partie,matricule) 
    VALUES (:id_histoire,:id_page_arret,:resume_partie,:matricule)";
    $repHistoire = $BDD->prepare($startHistoire);
    $repHistoire->execute(array(
        ':id_histoire' => $id,
        ':id_page_arret' => 1,
        'resume_partie' => $texte,
        'matricule' => $_SESSION['matricule'],
    ));
}

//Requête qui retourne la ligne de la table histoire qui concerne l'histoire choisie par le joueur
$maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id";
$response = $BDD->query($maRequete1);
$ligne = $response->fetch();
$id = $ligne["id_histoire"];
$title = $ligne["nom_histoire"];
$des_courte = $ligne["description_histoire"];
$image = $ligne["image_histoire"];
$nbParties = $ligne["nb_parties"];
$nbVictoires = $ligne["nb_victoires"];
$nbEchecs = $ligne["nb_echecs"];

//Requête donnant accès aux informations de partie relative à l'utilisateur connecté
$infoPartie = $BDD->query("SELECT * FROM partie_en_cours WHERE matricule=$matricule");
$lignePartie = $infoPartie->fetch();
$idPartie = $lignePartie['id_partie'];
$idHistoireEnCours = $lignePartie['id_histoire'];
$pdv = $lignePartie['nb_pdv'];
$pageArret = $lignePartie['id_page_arret'];
$resume = $lignePartie['resume_partie'];

//Requête qui relève la page où s'est arrêté le joueur 
$checkImpasseDepart = $BDD->query("SELECT * FROM pages WHERE id_pages=$pageArret");
$ligneCheck = $checkImpasseDepart->fetch();
$impasseOuPas = $ligneCheck['est_victoire_echec'];
$departOuPas = $ligneCheck['is_first_page'];

//Requête qui retourne le nom de l'histoire en cours 
$titleReprendreHistoire = $BDD->query("SELECT * FROM histoires WHERE id_histoire=$idHistoireEnCours");
$ligneReprendreHistoire = $titleReprendreHistoire->fetch();
$titleHistoire = $ligneReprendreHistoire['nom_histoire'];
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoire - <?= $title ?> </title>
</head>

<body>

    <?php

    include("includes/functions.php");

    if (!empty($_SESSION['user']))
        include("includes/navbar_connected.php");
    else
        include("includes/navbar.php");
    ?>

    </nav>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <!-- Image de couverture -->
                <div class="col-md-5 col-sm-7">
                    <img class="img-responsive movieImage" src="images/<?= $image ?>" title=<?= $title ?> />
                </div>
                <!-- Description de l'histoire -->
                <div class="col-md-7 col-sm-5">
                    <h2><?= $title ?></h2>
                    <p><small><?= $des_courte ?></small></p>
                </div>
                <!-- Bouton de jeu -->
                <div class="col-md-7 col-sm-5">
                    <a href="firstpage.php?story=<?= $title ?>&id=<?= $id ?>" class="btn btn-success" role="button"> Let's go !</a>
                </div>

            </div>
            <!-- Redirection vers la partie déjà commencée -->
            <?php if (!$departOuPas && $impasseOuPas != 2 && $pdv > 0) {
            ?><div class="alert alert-warning" role="alert"> Attention, vous avez déjà une partie en cours, voulez vous <a href="page.php?story=<?= $titleHistoire ?>&idstory=<?= $idHistoireEnCours ?>&idpage=<?= $pageArret ?>" class="alert-link">la reprendre ?</a>
                <?php
            }
                ?>
                </div>
        </div>
    </div>

    <?= include("includes/footer.php"); ?>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>