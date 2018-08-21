<!--affichage edition utilisateur-->
<?php
	//message d'erreur
	if($errors): ?>
		<div class="alert alert-danger">
    <?= $messageError ;?>
	</div>
<?php endif; ?>

<form method="post">
    <?= $form->input('name', 'Nom ou Pseudo *', null, true); ?>
   
    <!--Champ caché pour poster l'ID utilisateur -->
    <input type="hidden" name="id" value="<?=$_SESSION['auth']?>">

    <div class="form-group">
        <button class="btn btn-success">Sauvegarder</button>
        <a class="btn btn-primary" href="index.php">Annuler</a>
    </div>
 
</form>


