<?php  
if(!isset($_SESSION)){
    session_start();
}
$id = $_GET["id"];
$titrehistoire = $_GET["story"];
?>
<!doctype html>
<html> 
 
<?php include("includes/connect.php"); 

$maRequete = "SELECT * FROM pages WHERE id_pages = 1";
 
    $response = $BDD->query($maRequete);
    $ligne = $response->fetch();
    $idpage = $ligne["id_pages"];
    $texte = $ligne["text_page"];
    $idhistoire = $ligne["id_histoire"]; 
$matricule=$_SESSION['matricule'];
$reqVerifPartie="SELECT * FROM partie_en_cours WHERE matricule=$matricule";
$repVerifPartie=$BDD->query($reqVerifPartie);
$ligneVerifPartie=$repVerifPartie->fetch();
$nbPartiesJoueur=$repVerifPartie->rowcount();
if($nbPartiesJoueur==0)
{
    $startHistoire="INSERT INTO partie_en_cours (id_histoire,id_page_arret,resume_partie,matricule) 
    VALUES (:id_histoire,:id_page_arret,:resume_partie,:matricule)";
    $repHistoire=$BDD->prepare($startHistoire);
    $repHistoire->execute(array(
        ':id_histoire'=>$idhistoire,
        ':id_page_arret'=>1,
        'resume_partie'=> $texte,
        'matricule'=> $_SESSION['matricule'],
    ));
}
else 
{
    $updateHistoire=$BDD->prepare("UPDATE partie_en_cours SET id_histoire=:histoire , nb_pdv=:pdv, id_page_arret=:arret, resume_partie=:resume_partie");
    $updateHistoire->execute(array(
        'histoire'=>$idhistoire,
        'pdv'=>3,
        'arret'=>1,
        'resume_partie'=>$texte,
    ));
    ?> 
    <div class="alert alert-warning" role="alert"> Attention, vous avez déjà une partie en cours, voulez vous <a href="index.php" class="alert-link">retourner à l'accueil ?</a>  </div>
    <?php 
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoires_Croquignolesques </title>
</head>

<body>

<?php 
if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php"); 

include("functions.php");
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
                <div class="col- 1">
                    <p><small><?= $texte?></small></p>
                </div>
                <?php
                $maRequete2 = "SELECT * FROM liens_pages WHERE id_histoire = $id AND id_page_depart = $idpage";
                $response2 = $BDD->query($maRequete2);
                $nbchoix = $response2->rowCount();
                foreach ($response2 as $ligne2)
                {
                    $idpagechoix = $ligne2["id_page_arrivee"];
                    $maRequete3 = "SELECT * FROM pages WHERE id_pages = $idpagechoix";
                    $response3 = $BDD->query($maRequete3);
                    $ligne3 = $response3->fetch();
                    $textechoix = $ligne3["text_page"];
                    $descourte = $ligne3["desc_courte"];
                    ?>

                    <div class="col-sm-<?=$nbchoix?>">
                    <p><small><?= $descourte?></small></p>
                    <a href="page.php?story=<?=$titrehistoire?>&idstory=<?=$idhistoire?>&idpage=<?=$idpagechoix?>" class="btn btn-info" role="button"> J'y vais !</a>
                </div>
                <?php 
                } 
                
                ?>
                
            </div>
        </div>
            </div>
        
    <footer class="footer">
    Construit avec swag par lololezigoto, élève de l'<a href="https://www.ensc.fr">ENSC</a>.
</footer></div>

<!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>

</html>
