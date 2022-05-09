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
                    <?php 
                    if(isset($_SESSION['isAdmin']))
                        if($_SESSION['isAdmin']==1){?>

                        
                                        <ul class="nav navbar-nav">
                                <li><a href="histoire_add.php">Créer une nouvelle histoire</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li><a href="all_histoires_admin.php">Gérer les histoires existantes</a></li>
                            </ul>
                        <?php } ?>
                                <ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span> Bienvenue, <?= $_SESSION['user']?> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="logout.php">Se déconnecter</a></li>
                                </ul>
                                <li><a href="contact.php">Nous contacter</a></li>

                            </li>
                                    </ul>
                </div>
  </div>
</nav>
