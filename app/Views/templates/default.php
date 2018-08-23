<!doctype html>
<html lang="fr">
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/alaska.css" rel="stylesheet" />
   <link rel="shortcut icon" href="img/favicon.png" />
    <title>Billet simple pour l'Alaska</title>
</head>
    
<body>
    <?php 
        require 'frontNav.php';//appel connection users/admin.
    ?>

    <div class="container">
        <header class="row">
            <div class="col-md-12">
                <img src="img/alaska1.png" alt="Alaska">    
            </div>
        </header>
    </div><!-- fin container -->    
    
    <div class="container">
        <div class="blog-header">
            <div class="row">
                <div class="blog-title col-xs-12">Mon nouveau roman<br/> "Billet simple pour l'Alaska"<br/></div>
             
            </div>
            <br/>
            <br/>

            <div class="row">
                <div class="blog-description  col-xs-12 col-md-5 col-lg-4"><img src="img/livre2.png" alt="livre"></div>
                <div class ="col-xs-offset-0  col-xs-12 col-md-offset-1 col-md-6 col-lg-offset-3 col-lg-4 ">

                    <!--formulaire classement articles - trier-->
                    <form action="?p=billets.index" method="post" style="display: inline;">
        
                        <?php
                        //Gérer la valeur de select SortBy et sortDirection
                         
                            $AscSelected = '';
                            $DescSelected = '';

                            if (isset($_POST['sortBy'])) {
                                if ($_POST['sortBy'] == 'ASC') {
                                    $AscSelected = 'selected';
                                } else {
                                    $DescSelected = 'selected';
                                }
                            } elseif (isset($_COOKIE['sortDirection'])) {
                                if ($_COOKIE['sortDirection'] == 'ASC') {
                                    $AscSelected = 'selected';
                                } else {
                                    $DescSelected = 'selected';
                                }
                            }
                        ?>
                        <select name="sortBy">
                            <option value="ASC" <?= $AscSelected ;?>>Articles les plus anciens en premier</option>
                            <option value="DESC" <?= $DescSelected ;?>>Articles les plus récents en premier</option>
                        </select>
                        <button type="submit" class="btn btn-primary">
                            <span> Trier</span>
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div><!-- /container -->        

    <!-- MAIN CONTENT --------------------------------------------------------------------------------------------->
    <div class="container">
		<?= $content; ?>
	</div><!-- fin container -->

<?php
require ('htmlfooter.php');
?>
    <!--    jquery script    -->
    <script src="lib/jquery/jquery.min.js"></script>
     <!--    bootstrap-->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>