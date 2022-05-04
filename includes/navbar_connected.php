<?php if(!isset($_SESSION)){
    session_start();
}

?>

<div class="container">
        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-film"></span> Un site internet quelconque</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <?php 
                    if(isset($_SESSION['isAdmin']))
                        if($_SESSION['isAdmin']==1){?>

                        
                                        <ul class="nav navbar-nav">
                                <li><a href="histoire_add.php">Créer une nouvelle histoire</a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li><a href="gerer_histoire.php">Gérer les histoires existantes</a></li>
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
                            </li>
                                    </ul>
                </div>
            </div><!-- /.container -->
        </nav>