<?php  
session_start();
?>
<!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <title>Histoires croquignolesques - ajout d'une histoire</title>
</head>

<body>
<?php if(!empty($_SESSION['user']))
    include("includes/navbar_connected.php"); 
else 
    include("includes/navbar.php");
?> 
<div class="container">
          <h2 class="text-center">Ajout d'une histoire</h2>
          <h4 class="text-center">Cette page vous permet d'ajouter une histoire à la liste dont vous diposez actuellement.
          </br> Vous n'avez qu'à renseigner son nom, lui donner une description et télécharger un fichier qui lui servira d'image de couverture.
          <span class="glyphicon glyphicon-book">
          </h4>
          </br>
 
          <div class="well" style="    background-color: #D5F5E3;">
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

<?= include("includes/footer.php"); ?>

</div>
<!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script>    
</body>
</html>