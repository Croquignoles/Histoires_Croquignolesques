<?php 
include("includes/connect.php");
include("histoire_add.php");

$title = $_POST['title'];
$description = $_POST['description'];
//$longDescription = $_POST['longDescription'];
//$director = $_POST['director'];
//$year = $_POST['year'];
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