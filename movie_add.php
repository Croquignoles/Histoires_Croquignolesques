<!doctype html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>MyMovies - Ajout d'un film</title>
</head>
    <body>
      <?php include("includes/navbar.php"); ?>

          <h2 class="text-center">Ajout d'un film</h2>
          <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="traiteaddmovie.php" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre</label>
                <div class="col-sm-6">
                  <input type="text" name="title" value="" class="form-control" placeholder="Entrez le titre du film" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description courte</label>
                <div class="col-sm-6">
                  <textarea name="shortDescription" class="form-control" placeholder="Entrez sa description courte" required>
                                      </textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description longue</label>
                <div class="col-sm-6">
                  <textarea name="longDescription" class="form-control" rows="6" placeholder="Entrez sa description longue" required>
                                      </textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Réalisateur</label>
                <div class="col-sm-6">
                  <input type="text" name="director" value="" class="form-control" placeholder="Entrez son réalisateur" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Année de sortie</label>
                <div class="col-sm-4">
                  <input type="number" name="year" value="" class="form-control" placeholder="Entrez son année de sortie" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" name="image" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                  <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                </div>
              </div>
            </form>
          </div>

          <footer class="footer">
    Construit avec swag par lololezigoto, élève de l'<a href="https://www.ensc.fr">ENSC</a>.
</footer>      </div>

      <!-- jQuery -->
<script src="lib/jquery/jquery.min.js"></script>
<!-- JavaScript Boostrap plugin -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script>    </body>

  </html>
