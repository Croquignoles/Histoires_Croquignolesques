<?php
$id_histoire = $_GET['id'];
header("Location: gerer_histoire.php?id=$id_histoire");
include("includes/connect.php");
include("modif_histoire.php");
$title = $_POST['title'];
$description = $_POST['description'];
$id_page = $_POST['paradepart'];
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
?>