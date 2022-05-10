<?php function addGameFunction($BDD, $id, $currentNbParties)
{
    $req = $BDD->prepare("UPDATE histoires SET nb_parties = :nbParties WHERE id_histoire=:id");
    $req->execute(array(
    'nbParties' => $currentNbParties + 1,
    'id' => $id,
    ));

}

function addEchecFunction($BDD, $id, $currentNbEchecs)
{
$req = $BDD->prepare("UPDATE histoires SET nb_echecs = :nbEchecs WHERE id_histoire=:id");
    $req->execute(array(
    'nbEchecs' => $currentNbEchecs + 1,
    'id' => $id,
    ));

}

function addVictoireFunction($BDD, $id, $currentNbVictoires)
{
$req = $BDD->prepare("UPDATE histoires SET nb_victoires = :nbVictoires WHERE id_histoire=:id");
    $req->execute(array(
    'nbVictoires' => $currentNbVictoires + 1,
    'id' => $id,
    ));

}

function hideHistoire($BDD,$id,$trueOrFalse)
{
    $req = $BDD->prepare("UPDATE histoires SET isHidden = :cache WHERE id_histoire=:id");
    $req->execute(array(
        'cache'=>$trueOrFalse,
        'id'=>$id,


    ));
}
?>
