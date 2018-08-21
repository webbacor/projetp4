<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="description" content="">
    <meta name="author" content="Jean Forteroche">
    <link rel="shortcut icon" href="img/favicon.png" />
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/alaska.css" rel="stylesheet" />

    

    <script src='lib/tinymce/tinymce.min.js'></script>
    

    <script>
        tinymce.init({
            selector: '#tinytextarea',
            language: 'fr_FR',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code textcolor colorpicker '
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | forecolor  | alignleft aligncenter alignright alignjustify' +
            ' | bullist numlist outdent indent | link image'
        });
    </script>

    <title>billet simple pour l'Alaska</title>
 
</head>
    
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <!--navigation Accueil left-->
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

        </div><!-- fin container -->
    </nav>

    <div class="container admin-title">
        <span class="admin-title"><?= $title?></span>
    </div>

    <div class="container">
        <?= $content; ?>
	</div><!-- fin container -->

     <!--    script js-->
     <script src='js/backoffice.js'></script>

</body>
</html>