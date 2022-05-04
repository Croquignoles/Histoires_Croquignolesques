<?php session_start();

include("includes/connect.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isAdmin = $_POST['choixAdmin'];

if($isAdmin == "no")
{
    $boolAdmin = 0;
}
else if ($isAdmin == "yes")
{
    $boolAdmin = 1;
}

$requete = $BDD->prepare('INSERT INTO users (id_user, mdp_user, admin_user) VALUES (:pseudo,:pass, :booladmin)');
$requete->execute(array(
 'pseudo' => $login,
 'pass' => $mdp,
 'booladmin' => $boolAdmin,
));

$_SESSION['user'] = $login;        
header("Location:index.php");
?> 