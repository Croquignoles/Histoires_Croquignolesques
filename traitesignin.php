<?php session_start();

include("includes/connect.php");
include("signin.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isAdmin = $_POST["choixAdmin"];

if($isAdmin == "no")
{
    $boolAdmin = 0;
}
else if ($isAdmin == "yes")
{
    $boolAdmin = 1;
}


/*// Dans la requête, on remplace les valeurs issues de variables par des ?
$maRequete = "SELECT * FROM users WHERE (id_user=:login AND mdp_user=:mdp)";
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
$response = $BDD->prepare($maRequete);
$response = $BDD->execute($maRequete);*/


$requete = $BDD->prepare('INSERT INTO users (id_user, mdp_user, admin_user) VALUES (:pseudo,:pass, :booladmin)');
$requete->execute(array(
 'pseudo' => $pseudo,
 'pass' => $password,
 'booladmin' => $boolAdmin,
));

$_SESSION['user'] = $login;        
header("Location: index.php");


?> 