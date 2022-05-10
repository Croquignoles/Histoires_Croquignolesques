<?php if(!isset($_SESSION)){
    session_start();
}
$id_histoire = $_GET['id'];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoire Croquignolesques</title>
</head>

<body>
<?php 
require_once("includes/connect.php");
$maRequete1 = "SELECT * FROM histoires WHERE id_histoire=$id_histoire";
$response = $BDD->query($maRequete1);
$ligne = $response->fetch();
$id = $ligne["id_histoire"];
$nbParties = $ligne["nb_parties"];
$nbVictoires=$ligne["nb_victoires"];
$nbEchecs=$ligne["nb_echecs"];



// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
if(!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php"); 
else 
    require_once("includes/navbar.php");


$maRequete2 = "SELECT * FROM pages WHERE id_histoire=$id_histoire";
$response2 = $BDD->query($maRequete2);
$n = $response2->rowCount();
if($n==0){ ?>
    <h3 class="text-center">Cette histoire est vide :( </h3>
    <?php }
   
    ?>


<div class="container">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"  aria-controls="collapseTwo">
        Ajouter un nouveau paragraphe </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          <form class="form-horizontal" role="form" enctype="multipart/form-data" action="traiteajoutparaph.php?id=<?=$id_histoire?>" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label class="col-sm-4 control-label">Description courte du paragraphe</br><em>En gros une phrase d'accroche</em></label>
                <div class="col-sm-6">
                  <input type="text" name="title" value="" class="form-control" placeholder="Entrez une courte description du paragraphe" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description détaillée du paragraphe</label>
                <div class="col-sm-6">
                  <textarea name="description" class="form-control" placeholder="Entrez sa description" required> </textarea>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label"> </label>
                <label for="choix">Le paragraphe sera-t-il sans issue ? </label>
                <input type="checkbox" name="is_deadend" value="yes">
              </div>
              </br>
              <label class="col-sm-4 control-label"> </label>
              <label for="profession">À quel paragraphe doit-il être rattaché ?</label>
                <select id="para_depart" name="paradepart" >
                <option value="">--Choisissez un paragraphe--</option>
                <option value="cadre">Cadre</option>
                <option value="fonctionnaire">Fonctionnaire</option>
                <option value="se">Sans emploi</option>
                </select>
</br>
</br>
              <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4 mt-2">
                  <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-save"></span> Enregistrer cette histoire</button>
                </div>
              </div>
            </form>
      </div>
    </div>
  </div>

</div>
</div>

    <footer class="footer">
    Construit avec swag par lololezigoto, élève à l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>    </div>

    <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script></body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/boots

</html>