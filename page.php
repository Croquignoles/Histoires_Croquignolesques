<?php
if (!isset($_SESSION)) {
    session_start();
}
$idpage = $_GET["idpage"];
$titrehistoire = $_GET["story"];
$idhistoire = $_GET["idstory"];
if (isset($_GET['idpageretour'])) {
    $idPageRetour = $_GET['idpageretour'];
}
$matricule = $_SESSION['matricule'];

include("includes/connect.php");
include("includes/functions.php");
//Retourne les variables associées à la page actuelle de l'histoire choisie
$maRequete = "SELECT * FROM pages WHERE id_histoire = $idhistoire AND id_pages = $idpage";
$response = $BDD->query($maRequete);
$ligne = $response->fetch();
$textechoix1 = $ligne["text_page"];
$descourte1 = $ligne["desc_courte"];
$impasseOuVictoire = $ligne["est_victoire_echec"];

//Retourne la ligne correspondant à l'histoire en cours
$reqHistoire = "SELECT * FROM histoires WHERE id_histoire=$idhistoire";
$repHistoire = $BDD->query($reqHistoire);
$ligneHistoire = $repHistoire->fetch();
$echecs = $ligneHistoire["nb_echecs"];
$victoires = $ligneHistoire["nb_victoires"];

//Retourne les liens ayant pour départ la page active
$maRequete2 = "SELECT * FROM liens_pages WHERE id_histoire = $idhistoire AND id_page_depart = $idpage";
$response2 = $BDD->query($maRequete2);
$nbchoix = $response2->rowCount();
//Retourne les informations liées à la partie en cours 
$infoPartie = $BDD->query("SELECT * FROM partie_en_cours WHERE matricule=$matricule");
$lignePartie = $infoPartie->fetch();
$idPartie = $lignePartie['id_partie'];
$pdv = $lignePartie['nb_pdv'];
$pageArret = $lignePartie['id_page_arret'];
$resume = $lignePartie['resume_partie'];

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title> Histoires_Croquignolesques </title>
</head>

<body>

    <?php
    if (!empty($_SESSION['user']))
        include("includes/navbar_connected.php");
    else
        include("includes/navbar.php");
    ?>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <p><?= $textechoix1 ?></p>
                </div>
                </br>

                <?php
                //Cas où il n'y a plus de vie et qu'il s'agit d'une impasse
                if ($impasseOuVictoire == 0) {
                    if (isset($idPageRetour)) {
                        if ($pdv == 1) {
                            $reqUpdatePartie = $BDD->prepare("UPDATE partie_en_cours SET id_page_arret=:page_arret , resume_partie=:resume_partie");
                            $reqUpdatePartie->execute(array(
                                'page_arret' => $idpage,
                                'resume_partie' => $resume . " " . $textechoix1,
                            ));
                ?>
                            <div class="well">
                                <p class="center">Vous êtes mort</p>

                                <p class="center">Erf, malheureusement vous n'avez pas su prendre les bonnes décisions. Cela arrive mais nous vous suggérons d'écouter ce que vos amis ont à vous dire lors d'importantes décisions.
                                </p>
                                <p class="text-center">
                                    <a href="index.php" class="btn btn-danger" role="button"> Retour au choix des histoires </a>
                                </p>
                            </div>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Voir votre résumé
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $resume . $textechoix1; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            addEchecFunction($BDD, $idhistoire, $echecs);
                        //Cas où il s'agit d'une impasse mais les vies ne sont pas épuisées
                        } else {
                        ?><div>
                                <h3 class="text-center">Au vu de la situation, mon choix n'était peut être pas le bon, mon moral en prend un coup et je décide de rebrousser chemin.</h3>
                            </div>
                            <article class="container">
                                <div class="text-center">
                                    <a href="page.php?story=<?= $titrehistoire ?>&idstory=<?= $idhistoire ?>&idpage=<?= $idPageRetour ?>" class="btn btn-danger" role="button"> Retour en arrière </a>
                                </div>
                            </article>
                        <?php
                        }
                    } else {
                        if ($pdv == 1) {
                            $reqUpdatePartie = $BDD->prepare("UPDATE partie_en_cours SET id_page_arret=:page_arret , resume_partie=:resume_partie");
                            $reqUpdatePartie->execute(array(
                                'page_arret' => $idpage,
                                'resume_partie' => $resume . " " . $textechoix1,
                            ));
                        ?>
                            <div class="well">
                                <p class="center">Vous êtes mort</p>
                                <p class="text-center">Erf, malheureusement vous n'avez pas su prendre les bonnes décisions. Cela arrive mais nous vous suggérons d'écouter ce que vos amis ont à vous dire lors d'importantes décisions.
                                </p>
                                <p class="text-center">
                                    <a href="index.php" class="btn btn-danger" role="button"> Retour au choix des histoires </a>
                                </p>
                            </div>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Voir votre résumé
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $resume . $textechoix1; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            addEchecFunction($BDD, $idhistoire, $echecs);
                        } else {
                        ?><div>
                                <h3 class="text-center">Au vu de la situation, mon choix n'était peut être pas le bon, mon moral en prend un coup et je décide de rebrousser chemin.</h3>
                            </div>
                            <article class="container">
                                <div class="text-center">
                                    <a href="page.php?story=<?= $titrehistoire ?>&idstory=<?= $idhistoire ?>&idpage=<?= 1 ?>" class="btn btn-danger" role="button"> Retour en arrière </a>
                                </div>
                            </article>
                    <?php
                        }
                    }

                    retirePdv($BDD, $matricule, $pdv);
                //Cas de la victoire
                } elseif ($impasseOuVictoire == 2) {
                    $reqUpdatePartie = $BDD->prepare("UPDATE partie_en_cours SET id_page_arret=:page_arret , resume_partie=:resume_partie");
                    $reqUpdatePartie->execute(array(
                        'page_arret' => $idpage,
                        'resume_partie' => $resume . " " . $textechoix1,
                    ));
                    ?><div>
                        <h3 class="text-center">Oh mais, ne serait-ce pas la victoire que j'apperçois là ? J'ai toujours su que j'étais destiné à de grandes choses !</h3>
                    </div>
                    <article class="container">
                        <div class="text-center">
                            <a href="index.php" class="btn btn-success" role="button"> Retour au choix des histoires </a>
                        </div>
                    </article>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Voir votre résumé
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <?php echo $resume . $textechoix1; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    addVictoireFunction($BDD, $idhistoire, $victoires);
                //Cas intermédiare
                } else {
                    //Affichage des choix disponible pour l'utilisateur 
                    foreach ($response2 as $ligne2) {
                        $idpagechoix = $ligne2["id_page_arrivee"];
                        $idLien = $ligne2["id_lien"];
                        $maRequete3 = "SELECT * FROM pages WHERE id_pages = $idpagechoix";
                        $response3 = $BDD->query($maRequete3);
                        $ligne3 = $response3->fetch();
                        $descourte = $ligne3["desc_courte"];
                    ?>
                        <div class="col-sm-2> text-center">
                            <p><small><?= $descourte ?> : </small>
                                <a href="page.php?story=<?= $titrehistoire ?>&idstory=<?= $idhistoire ?>&idpage=<?= $idpagechoix ?>&idpageretour=<?= $idpage ?>" class="btn" role="button">
                                    <span class="glyphicon glyphicon-circle-arrow-right"></span> J'y vais !</a>
                            </p>
                        </div>
                <?php

                    }
                    //Vérification de doublon dans le résumé
                    if (!str_contains($resume, $textechoix1)) {
                        $reqUpdatePartie = $BDD->prepare("UPDATE partie_en_cours SET id_histoire=:id_histoire , id_page_arret=:id_page_arret , resume_partie=:resume_partie WHERE matricule=:matricule");
                        $reqUpdatePartie->execute(array(
                            'matricule' => $matricule,
                            'id_histoire' => $idhistoire,
                            'id_page_arret' => $idpage,
                            'resume_partie' => $resume . $textechoix1,
                        ));
                    }
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