<?php function addGameFunction($BDD, $id, $actualNbParties)
{
    $req = $BDD->prepare("UPDATE histoires SET nb_parties = :nbParties WHERE id_histoire=:id");
    $req->execute(array(
    'nbParties' => $actualNbParties + 1,
    'id' => $id,
    ));

}
?>
