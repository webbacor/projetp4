<!doctype html>
<html>

<?php
    require ('htmlhead.php');
?>

    
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <!--navigation Home left-->
            <div class="navbar-header">
                <img src="img/blogmini.png" alt="blocmini">
                <a id="nav-home" class="navbar-brand" href="index.php">
                    <span class="glyphicon glyphicon-home"></span> Accueil</a>


            </div>
            <!--Navigation right-->
            <ul class="nav navbar-nav navbar-right">

                 <li><a id="lien-accueil" href="index.php?p=admin.billets.index">Billet</a></li>
                <li><a id="lien-accueil" href="index.php?p=admin.comments.index">Commentaire</a></li>
                <li><a id="lien-accueil" href="?p=admin.users.index"></span> Utilisateur</a></li>
                <li><a id="lien-accueil" href="?p=users.logout"></span> Deconnexion</a></li>
            </ul>

        </div><!-- end container -->
    </nav>

    <div class="container admin-title">
        <span class="admin-title"><?= $title?></span>
    </div>

    <div class="container">
        <?= $content; ?>
	</div><!-- end container -->

     <!--    script js-->
     <script src='js/backoffice.js'></script>

</body>
</html>