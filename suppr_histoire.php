<?php if(!isset($_SESSION)){
    session_start();

include("includes/connect.php");

$id_histoire = $_GET['id'];
$requete = 'DELETE FROM histoires WHERE id_histoire=:id';
$response = $BDD->prepare($requete);
$response->execute(array(
 'id' => $id_histoire
));

header("Location: all_histoires_admin.php");

}