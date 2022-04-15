<?php 
include("includes/connect.php");
include("movie_add.php");

$title = $_POST['title'];
$shortDescription = $_POST['shortDescription'];
$longDescription = $_POST['longDescription'];
$director = $_POST['director'];
$year = $_POST['year'];
$image = $_FILES['image']['name'];
echo $image;

$req = 'INSERT INTO movie (mov_title, mov_description_short, mov_description_long, mov_director, mov_year, mov_image) 
VALUES (:mov_title, :mov_description_short, :mov_description_long, :mov_director, :mov_year, :mov_image)';
$response = $BDD->prepare($req);
$response->execute(array(
 'mov_title' => $title,
 'mov_description_short' => $shortDescription,
 'mov_description_long' => $longDescription,
 'mov_director' => $director,
 'mov_year' => $year,
 'mov_image' => $image,
));

?>