<?php
$id_histoire = $_GET['id'];
header("Location: gerer_histoire.php?id=<?=$id_histoire?>");
include("includes/connect.php");
include("modif_histoire.php");
$title = $_POST['title'];
$description = $_POST['description'];
if(isset($_POST['is_deadend'])){
    $dead = 2;
} else {
    $dead = 1;
}


$req = 'INSERT INTO pages (desc_courte, text_page, est_victoire_echec) 
VALUES (:desc_courte, :text_page, :est_victoire_echec)';
$response = $BDD->prepare($req);
$response->execute(array(
 'desc_courte' => $title,
 'text_page' => $description,
 'est_victoire_echec' => $dead,
));
?>