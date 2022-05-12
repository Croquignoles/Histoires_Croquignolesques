<?php session_start();

include("includes/connect.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isAdmin = $_POST['choixAdmin'];
$mdp_check = $_POST['password_check'];
//Définie le type de l'utilisateur 
if($isAdmin == "no")
{
    $boolAdmin = 0;
}
else if ($isAdmin == "yes")
{
    $boolAdmin = 1;
}

//Ajout du nouvel utilisateur dans la table users de la BDD
if($mdp==$mdp_check)
{
$requete = $BDD->prepare('INSERT INTO users (id_user, mdp_user, admin_user) VALUES (:pseudo,:pass, :booladmin)');
$requete->execute(array(
 'pseudo' => $login,
 'pass' => $mdp,
 'booladmin' => $boolAdmin,
));
//Initialisation des variables de session
$reqMat=$BDD->query("SELECT * FROM users WHERE id_user=$login AND mdp_user=$mdp");
$repMat=$reqMat->fetch();
$matricule=$repMat['matricule'];
$_SESSION['matricule']=$matricule;
$_SESSION['user'] = $login;        
header("Location:index.php");
} else {   
header("Location:mdp_incorrect.php");
}


?> 