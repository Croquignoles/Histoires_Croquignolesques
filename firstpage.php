<?php
if (!isset($_SESSION)) {
    session_start();
}

//Page du site qui affiche et gère la première page d'une histoire 

$id = $_GET["id"];
$titrehistoire = $_GET["story"];
include("includes/connect.php");

//Requête qui permet de trouver l'id de la première page de l'histoire concernée grâce à la variable booléenne is_first_page
$maRequeteFirst = "SELECT * FROM pages WHERE id_histoire = $id && is_first_page=1";
$responseFirst = $BDD->query($maRequeteFirst);
$ligneF = $responseFirst->fetch();
$id_first = $ligneF['id_pages'];

//Requête qui récupère la ligne de la table pages associée à la première page l'histoire concerné 
$maRequete = "SELECT * FROM pages WHERE id_pages = $id_first";
$response = $BDD->query($maRequete);
$ligne = $response->fetch();
$idpage = $ligne["id_pages"];
$texte = $ligne["text_page"];
$idhistoire = $ligne["id_histoire"];
$matricule = $_SESSION["matricule"];

//Requête qui vérifie si le joueur a une partie en cours et met les informations à jour en conséquence
$reqVerifPartie = "SELECT * FROM partie_en_cours WHERE matricule=$matricule";
$repVerifPartie = $BDD->query($reqVerifPartie);
$ligneVerifPartie = $repVerifPartie->fetch();
$nbPartiesJoueur = $repVerifPartie->rowcount();
if ($nbPartiesJoueur != 0) {
    $updateHistoire = $BDD->prepare("UPDATE partie_en_cours SET id_histoire=:histoire , nb_pdv=:pdv,id_page_arret=:arret, resume_partie=:resume_partie");
    $updateHistoire->execute(array(
        'histoire' => $idhistoire,
        'pdv' => 3,
        'arret' => 1,
        'resume_partie' => $texte,

    ));
}

//Requête permettant d'accéder 
$infoPartie = $BDD->query("SELECT * FROM partie_en_cours WHERE matricule=$matricule");
$lignePartie = $infoPartie->fetch();
$pdv = $lignePartie['nb_pdv'];
$pageArret = $lignePartie['id_page_arret'];


?>

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

    <?php
    if (!empty($_SESSION['user']))
        include("includes/navbar_connected.php");
    else
        include("includes/navbar.php");

    include("includes/functions.php");

    //Requête permettant d'obtenir la ligne de notre histoire telle qu'inscrite dans la table histoire
    $maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id";
    $response = $BDD->query($maRequete1);
    $ligne = $response->fetch();
    $nbParties = $ligne["nb_parties"];
    addGameFunction($BDD, $id, $nbParties) 
    ?>

    </nav>

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <!-- Contenu du paragraphe actif -->
                <div class="col- 1">
                    <p><small><?= $texte ?></small></p>
                </div>
                <?php
                $maRequete2 = "SELECT * FROM liens_pages WHERE id_histoire = $id AND id_page_depart = $idpage";
                $response2 = $BDD->query($maRequete2);
                $nbchoix = $response2->rowCount();
                //Affichage des choix possible pour la page active 
                foreach ($response2 as $ligne2) {
                    $idpagechoix = $ligne2["id_page_arrivee"];
                    $maRequete3 = "SELECT * FROM pages WHERE id_pages = $idpagechoix";
                    $response3 = $BDD->query($maRequete3);
                    $ligne3 = $response3->fetch();
                    $textechoix = $ligne3["text_page"];
                    $descourte = $ligne3["desc_courte"];
                ?>
                    <!-- Bouton de redirection -->
                    <div class="col text-center">
                        <p><small><?= $descourte ?></small>
                            <a href="page.php?story=<?= $titrehistoire ?>&idstory=<?= $idhistoire ?>&idpage=<?= $idpagechoix ?>&idpageretour=<?= $idpage ?>" class="btn" role="button">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span> J'y vais !</a>
                    </div>
                    </p>
                <?php
                }

                ?>

            </div>
        </div>
    </div>

    </div>

    <?= include("includes/footer.php"); ?>

    <!-- jQuery -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>