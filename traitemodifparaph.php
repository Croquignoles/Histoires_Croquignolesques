<?php
$id_histoire = $_GET['id_histoire'];
$id_pages = $_GET['id_page'];
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
if(isset($_POST['is_goodend'])){
    $dead = 0;
} else {
    $dead = 1;
}

$requete = $BDD->prepare("UPDATE pages SET desc_courte = :desc_courte WHERE id_pages = :id");
$requete->execute(array(
    'desc_courte' => $title,
    'id' => $id_pages
));
?>