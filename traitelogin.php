<?php session_start();

include("includes/connect.php");
include("login.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isConncted = false;


/*// Dans la requête, on remplace les valeurs issues de variables par des ?
$maRequete = "SELECT * FROM users WHERE (id_user=:login AND mdp_user=:mdp)";
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
$response = $BDD->prepare($maRequete);
$response = $BDD->execute($maRequete);*/

$requete = "SELECT * FROM users WHERE id_user=? AND mdp_user=?";
$response = $BDD->prepare($requete);
$response->execute(array($login, $mdp));
$ligne = $response->fetch();
$nb = $response->rowCount(); 
$isAdmin = $ligne['admin_user'];

if ($nb ==0){                
    echo "Utilisateur non reconnu ! "; 
}else if ($nb==1){        
     echo "Bonjour " . $login . "!";        
        $_SESSION['user'] = $login;        
        header("Location: index.php");
        if($isAdmin==0){
            $_SESSION['isAdmin'] = 0;
        } else {
            $_SESSION['isAdmin'] = 1;        

}

} else {
    echo "Chelou ta bdd mon reuf";
}


?> 