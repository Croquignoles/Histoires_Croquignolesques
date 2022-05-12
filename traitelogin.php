<?php session_start();

include("includes/connect.php");

$login = $_POST['login'];
$mdp = $_POST['password'];
$isConncted = false;
//Renvoie la ligne de la table users correspondant à l'utilisateur qui se connecte
$requete = "SELECT * FROM users WHERE id_user=? AND mdp_user=?";
$response = $BDD->prepare($requete);
$response->execute(array($login, $mdp));
$ligne = $response->fetch();
$nb = $response->rowCount(); 

//Vérification de la validité des identifiants et initialisation des variables de session
if ($nb ==0){                
    echo "Utilisateur non reconnu ! "; 
}else if ($nb==1){        
     echo "Bonjour " . $login . "!";
     $isAdmin = $ligne['admin_user'];
$matricule=$ligne['matricule'];        
        $_SESSION['user'] = $login;
        $_SESSION['matricule'] =$matricule;       
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