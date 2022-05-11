<?php
$id_histoire = $_GET['id_histoire'];
$id_page = $_GET['id_page'];
header("Location: gerer_histoire.php?id=$id_histoire");

include("includes/connect.php");
include("modif_histoire.php");
$title = $_POST['title'];
$id_page_dep = $_POST['paradepart'];
$description = $_POST['description'];
if(isset($_POST['is_deadend'])){
    $dead = 0;
} else {
    $dead = 1;
}
if(isset($_POST['is_goodend'])){
    $dead = 2;
} 


$req = $BDD->prepare('UPDATE pages SET desc_courte = :desc_courte, text_page = :text_page, est_victoire_echec = :deadend WHERE id_pages = :id');
$req->execute(array(
 'desc_courte' => $title,
 'text_page' => $description,
 'deadend' => $dead,
 'id' => $id_page
));

$req2 = $BDD->prepare('UPDATE liens_pages SET id_page_depart=:pagedep, id_page_arrivee = :pagearr, id_histoire = :idhist WHERE id_page_arrivee = :id');
$req2->execute(array(
 'pagedep' => $id_page_dep,
 'pagearr' => $id_page,
 'idhist' => $id_histoire,
 'id' => $id_page
));


?>