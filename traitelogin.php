<?php session_start();

include("includes/connect.php");
include("login.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isConncted = false;


// Dans la requête, on remplace les valeurs issues de variables par des ?
$maRequete = "SELECT * FROM users";
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
$response = $BDD->query($maRequete);
while($ligne = $response->fetch()) {
    if ($ligne["id_user"]==$login && $ligne["mdp_user"]==$mdp){
        echo "Bonjour " . $login . "!";        
        $_SESSION['user'] = $login;
        header("Location: index.php");
    } else {
                echo "Utilisateur non reconnu ! "; 
    }
}



?> 