<!doctype html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Histoires croquignolesques - ajout d'une page</title>
</head>
    <body>
      <?php include("includes/navbar.php");
            include ("includes/connect.php");
      ?>

          <h2 class="text-center">Ajout d'une page</h2>
          <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="traiteaddpages.php" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label class="col-sm-4 control-label">contenu de la page</label>
                <div class="col-sm-6">
                  <textarea name="contenu" class="form-control" placeholder="Entrez le contenu de la page" required>
                                      </textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre de l'histoire</label>
                <div class="col-sm-6">
                <select name='titreHistoire' id='histoire_select' required>
                    <option value="">--Choisissez l'histoire à laquelle appartient cette page--</option>
                    <?php 
                      $maRequete = "SELECT * FROM histoires";
                      $rep = $BDD->query($maRequete);
                      $nbHistoire = $rep->rowCount(); 
                      for ($i=1;$i<=$nbHistoire;$i++)
                      {
                        $ligne = $rep->fetch();
                        $title = $ligne["nom_histoire"];
                        ?>
                        <option value="numeroPage"><?=$title?></option>
                        <?php
                      }
                    ?>
                </div>
              </div>
                    
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre de l'histoire</label>
                <div class="col-sm-6">
                  <select name='pageDepart' id='page_select' required>
                    <option value="">--Choisissez la page qui amène a cette page--</option>
                    <option value="firstPage">Première page</option>
                    <?php 
                      $req="SELECT COUNT('id_pages') FROM histoires";
                      $rep=$BDD->query($req);
                      for ($i=1;$i<=$rep;$i++)
                      {
                        ?>
                        <option value="numeroPage"><?=$i?></option>
                        <?php
                      }
                    ?>
                    
                    

                  </select>
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
