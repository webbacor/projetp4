<!doctype html>
<html>
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

<footer>
       
    <div class="ecrivain">
       <img src="img/ecrivain.jpg" alt="ecrivain" >

       <div histoire> <p>

             Mon Roman en ligne<br/>

             Bienvenue sur le site de mon roman en ligne, c'est un nouveau concept que je mets en pratique, je posterai à intervales réguliers les épisodes de mon nouveau roman intitulé "Billet simple pour l'Alaska".<br/>

             J'espère que ce concept et son contenu vous plaîront, n'hésitez pas à laisser vos avis et réactions en commentaires,vous pouvez m'envoyer également un message via <a href=mailto:web.bacor@gmail>JForteroche@gmail.com</a>
             <br/>Bonne lecture et merci de l'interêt porté à mon roman.<br/></p>
            <br/>

        </div>
  
    </div>

    <img src="img/signature.png" alt="signature"/>
       
  <br/>
 <img src="img/livreban.png" alt="livre footer"><br/>
<button data-toggle="modal" href="#infos" class="btn btn-primary">Mentions Légales</button>

        <?php 
        require '../web/mentions.php';
        ?>

<button data-toggle="modal" href="#infop" class="btn btn-primary">Politique de confidentilité</button>

      <?php 
        require '../web/pconfid.php';
        ?>

        

        
 <br/>
</footer>
    <!--    jquery script    -->
    <script src="lib/jquery/jquery.min.js"></script>
     <!--    bootstrap-->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>