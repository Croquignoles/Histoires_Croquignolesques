<?php if(!isset($_SESSION)){
    session_start();
}

?>

<nav class="navbar fixed-top navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"> <span class="glyphicon glyphicon-send"></span> Croquignolerie <span class="glyphicon glyphicon-send"></span>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                   
                                <ul class="nav navbar-nav navbar-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="login.php">Se connecter</a></li></ul>
                                    <ul class="nav navbar-nav">
                                    <li><a href="signin.php">S'inscrire</a></li></ul>
                                    <ul class="nav navbar-nav">
                                    <li><a href="contact.php">Nous contacter</a></li></ul>


                </div>
  </div>
</nav>