<?php session_start();

include("includes/connect.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isConncted = false;

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