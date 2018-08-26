<!doctype html>
<html lang="fr">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/alaska.css" rel="stylesheet" />
   <link rel="shortcut icon" href="img/favicon.png" />
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

    <title>Billet simple pour l'Alaska</title>

    <?php require 'frontNav.php'?><!--appel connection users/admin.-->
</head>

<body>

	<div class="container admin-title">
		<span class="admin-title"><?= $title?></span>
	</div>

    <div class="container">
        <?= $content; ?>
    </div><!--/container -->

    <!--    jquery script    -->
    <script src="lib/jquery/jquery.min.js"></script>
    <!--    bootstrap-->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>