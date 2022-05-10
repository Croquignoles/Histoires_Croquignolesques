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



// Dans la requête, on remplace les valeurs issues de variables par des ?
// On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
if(!empty($_SESSION['user']))
    require_once("includes/navbar_connected.php"); 
else 
    require_once("includes/navbar.php");
?>


<div class="container">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Ajouter un nouveau paragraphe
        </button>
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
                <label class="col-sm-4 control-label">Cochez ici si le paragraphe est sans issue : </label>
                <div class="col-sm-6">
                <label for="choix"></label>
                <input type="checkbox" name="is_deadend" value="yes">
                </div>
              </div>
              </br>
              <div class="form-group">
                <label class="col-sm-4 control-label">Cochez ici si le paragraphe est l'issue victorieuse du jeu : </label>
                <div class="col-sm-6">
                <label for="choix"></label>
                <input type="checkbox" name="is_goodend" value="yes">
                </div>
              </div>
              </br>
              <label class="col-sm-4 control-label">À quel paragraphe doit-il être rattaché ? </label>
              <label for="relation"></label>                
              <select id="paradepart" name="paradepart" >
                <option value="">-- Choisissez un paragraphe --</option>
                <?php 
                $maRequete = "SELECT * FROM pages WHERE id_histoire = $id_histoire";
                $response = $BDD->query($maRequete);
                $nb = $response->rowCount();
                $tab = $response->fetchAll();
                if($nb==0) {
                ?>
                <option value="cadre">Aucun paragraphe pour l'instant. Je crée le premier !</option> 
                <?php
                } else {
                foreach ($tab as $key => $ligne) {
                    $id = $ligne["id_pages"];
                    $title = $ligne["desc_courte"];
                    ?>
                  <option value="cadre"><?=$id?> - <?=$title?></option>
                <?php } 
                }?>
            </select>
</br>
</br>
              <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4 mt-2">
                  <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-save"></span> Enregistrer ce paragraphe </button>
                </div>
              </div>
            </form>      
        </div>
    </div>
  </div>

  <?php 
                $maRequete = "SELECT * FROM pages WHERE id_histoire = $id_histoire";
                $response = $BDD->query($maRequete);
                $nb = $response->rowCount();
                $tab = $response->fetchAll();
                foreach ($tab as $key => $ligne) {
                    $id = $ligne["id_pages"];
                    $title = $ligne["desc_courte"]; 
                    $text = $ligne["text_page"];
                    $is_deadend = $ligne["est_victoire_echec"];
                ?>
                 <div class="card">
                    <div class="card-header" id="heading<?=$id?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?=$id?>" aria-expanded="false" aria-controls="collapse<?=$id?>">
                        <?=$title?>
                        </button>
                    </h5>
                    </div>
                    <div id="collapse<?=$id?>" class="collapse" aria-labelledby="heading<?=$id?>" data-parent="#accordionExample">
                    <div class="card-body">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="traitemodifparaph.php?id=<?=$id_histoire?>" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label class="col-sm-4 control-label">Description courte du paragraphe</br><em>En gros une phrase d'accroche</em></label>
                <div class="col-sm-6">
                  <input type="text" name="title" value="<?=$title?>" class="form-control" placeholder="Entrez une courte description du paragraphe" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description détaillée du paragraphe</label>
                <div class="col-sm-6">
                  <textarea name="description" class="form-control" placeholder="Entrez sa description" required> <?=$text?></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-4 control-label">Cochez ici si le paragraphe est sans issue : </label>
                <div class="col-sm-6">
                <label for="choix"></label>
                <?php 
                if($is_deadend==2){
                ?><input type="checkbox" name="is_deadend" value="yes" checked>
                <?php } else {
                ?> <input type="checkbox" name="is_deadend" value="yes">
                <?php } ?>
                </div>
              </div>
              </br>
              <div class="form-group">
                <label class="col-sm-4 control-label">Cochez ici si le paragraphe est l'issue victorieuse du jeu : </label>
                <div class="col-sm-6">
                <label for="choix"></label>
                <?php 
                if($is_deadend==0){
                ?><input type="checkbox" name="is_deadend" value="yes" checked>
                <?php } else {
                ?> <input type="checkbox" name="is_deadend" value="yes">
                <?php } ?>
                </div>
              </div>
              </br>
              <label class="col-sm-4 control-label">À quel paragraphe doit-il être rattaché ? </label>
              <label for="relation"></label>                
              <select id="paradepart" name="paradepart" >
                <?php 
                $maRequete = "SELECT * FROM pages WHERE id_histoire = $id_histoire";
                $response = $BDD->query($maRequete);
                $nb = $response->rowCount();
                $tab = $response->fetchAll();
                if($nb==0) {
                ?>
                <option value="">-- Choisissez un paragraphe --</option>
                <option value="cadre">Aucun paragraphe pour l'instant. Je crée le premier !</option> 
                <?php
                } else {
                ?>
                <option value=""><?=$id?> - <?=$title?></option>
                <?php 
                foreach ($tab as $key => $ligne) {
                    $id2 = $ligne["id_pages"];
                    $title2 = $ligne["desc_courte"];
                    ?>
                  <option value="cadre"><?=$id2?> - <?=$title2?></option>
                <?php } 
                }?>
            </select>
            </br>
            </br>
              <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4 mt-2">
                  <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-refresh"></span> Modifier ce paragraphe </button>
                </div>
              </div>
            </form> 
                    </div>
                    </div>
                </div>
                
            <?php } ?>
 
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