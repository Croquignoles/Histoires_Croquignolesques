<!-- Fonction qui incrémente le nombre de partie que le joueur a joué pour une histoire donnée -->
<?php function addGameFunction($BDD, $id, $currentNbParties)
{
    $req = $BDD->prepare("UPDATE histoires SET nb_parties = :nbParties WHERE id_histoire=:id");
    $req->execute(array(
        'nbParties' => $currentNbParties + 1,
        'id' => $id,
    ));
}

//Fonction qui incrémente le nombre d'échec que le joueur a connu pour une histoire donnée
function addEchecFunction($BDD, $id, $currentNbEchecs)
{
    $req = $BDD->prepare("UPDATE histoires SET nb_echecs = :nbEchecs WHERE id_histoire=:id");
    $req->execute(array(
        'nbEchecs' => $currentNbEchecs + 1,
        'id' => $id,
    ));
}

//Fonction qui incrémente le nombre de victoire que le joueur a connu pour une histoire donnée
function addVictoireFunction($BDD, $id, $currentNbVictoires)
{
    $req = $BDD->prepare("UPDATE histoires SET nb_victoires = :nbVictoires WHERE id_histoire=:id");
    $req->execute(array(
        'nbVictoires' => $currentNbVictoires + 1,
        'id' => $id,
    ));
}

//Fonction qui met à jour la BDD pour qu'une histoire soit considérée comme cachée 
function hideHistoire($BDD, $id, $trueOrFalse)
{
    $req = $BDD->prepare("UPDATE histoires SET isHidden = :cache WHERE id_histoire=:id");
    $req->execute(array(
        'cache' => $trueOrFalse,
        'id' => $id,
    ));
}

//Fonction qui met à jour la BDD pour que les points de vie du joueur diminue à mesure qu'il joue et se trompe 
function retirePdv($BDD, $matricule, $currentPdv)
{
    $req = $BDD->prepare("UPDATE partie_en_cours SET nb_pdv = :pdv WHERE matricule=:matricule");
    $req->execute(array(
        'pdv' => $currentPdv - 1,
        'matricule' => $matricule,
    ));
}
?>