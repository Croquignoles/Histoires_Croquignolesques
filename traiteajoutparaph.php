<?php
$id_histoire = $_GET['id_histoire'];
header("Location: gerer_histoire.php?id=$id_histoire");
include("includes/connect.php");
include("modif_histoire.php");
$title = $_POST['title'];
$description = $_POST['description'];
$id_page_dep = $_POST['paradepart'];
if(isset($_POST['is_deadend'])){
    $dead = 2;
} else {
    $dead = 1;
}


$req = 'INSERT INTO pages (desc_courte, text_page, est_victoire_echec, id_histoire) 
VALUES (:desc_courte, :text_page, :est_victoire_echec, :id_histoire)';
$response = $BDD->prepare($req);
$response->execute(array(
 'desc_courte' => $title,
 'text_page' => $description,
 'est_victoire_echec' => $dead,
 'id_histoire' => $id_histoire,
));
    $requete = "SELECT * FROM pages WHERE desc_courte=:desc_courte";
    $response = $BDD->prepare($requete);
    $response->execute(array("desc_courte"=>$title));
    $ligne = $response->fetch();
    $id_page = $ligne["id_pages"];

$req2 = $BDD->prepare('INSERT INTO liens_pages (id_page_depart, id_page_arrivee, id_histoire) VALUES (:pagedep,
:pagearr, :idhist)');
$req2->execute(array(
 'pagedep' => $id_page_dep,
 'pagearr' => $id_page,
 'idhist' => $id_histoire,
));
?>