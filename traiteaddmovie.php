<?php 
ob_start();
include("includes/connect.php");
require_once("histoire_add.php");
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image']['name'];
$req = 'INSERT INTO histoires (nom_histoire, description_histoire, image_histoire) 
VALUES (:nom_histoire, :description_histoire, :image_histoire)';
$response = $BDD->prepare($req);
$response->execute(array(
 'nom_histoire' => $title,
 'description_histoire' => $description,
 'image_histoire' => $image,
));
header("Location: index.php");
?>