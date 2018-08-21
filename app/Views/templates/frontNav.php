<!-- Navigation menu accueil et connexion  -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
              
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                </button>
                <img src="img/blogmini.png" class="blogimg" alt="blogmini"/>

                <a id="nav-home" class="navbar-brand nav-home" href="index.php">
                    <span class="glyphicon glyphicon-home"></span> Accueil
                </a>
            </div>
             
			<ul class="nav navbar-nav navbar-right">

			     <?php
                // Aucun utilisateur connecté. affiche page users.login(authentification)
			     if (!isset($_SESSION['auth'])){ ?>
                     <li>
                       <a id="lien-accueil" href="?p=users.login">Connexion</a>
                    </li>
                 <?php } 
                 else {
                    // si un utilisateur est connecté. Est-il administrateur? si oui affiche page admin.billets.index(gestion des billets)
                    if ($_SESSION['role'] == 'admin') { ?>
                    <li>
                        <a id="lien-accueil" href="?p=admin.billets.index">Administration</a>
                    </li>
                <?php } ?>

                <!--Utilisateur connecté-->
                <li class="dropdown">
                    <a id="lien-accueil" class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
                        Bienvenue <?= $_SESSION['name'] ?>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="?p=users.logout">Deconnexion</a></li>
                    </ul>

                </li>
                <?php } ?>
            </ul>
    </div><!-- /container -->
</nav>
 
