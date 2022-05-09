<?php if(!isset($_SESSION)){
    session_start();
}
$id_histoire = $_GET['id'];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Les deux lignes en dessous c'est quoi ça??-->
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
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          Nouveau paragraphe 
          <form class="form-horizontal" role="form" enctype="multipart/form-data" action="traiteaddmovie.php" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre de l'histoire</label>
                <div class="col-sm-6">
                  <input type="text" name="title" value="" class="form-control" placeholder="Entrez le titre de l'histoire" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description de l'histoire</label>
                <div class="col-sm-6">
                  <textarea name="description" class="form-control" placeholder="Entrez sa description" required> </textarea>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Image associée </label>
                <div class="col-sm-4">
                  <input class="form-control" type="file" name="image" />
                </div>
              </div>
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
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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