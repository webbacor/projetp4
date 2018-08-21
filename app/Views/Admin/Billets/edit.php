<!-- formulaire pour ajouter ou éditer un billet -->
<form method="post">
    <div class="form-group row">
        <div class="col-md-11"><label>TITRE</label><input class="form-control" name="title" value="<?= $form->getValue('title');?>"
            type="text" required=""></div>

        <div class="col-md-1"><label>Chapitre</label><input class="form-control" name="chapter" value="<?= $form->getValue('chapter');?>"
            type="text" required="" placeholder="N°"></div>
    </div>

    <?= $form->input('content', 'Contenu', ['type' => 'tinytextarea'], true); ?>
    <div class="form-group ">
        <?php
            if ($form->getValue('status') === 'Publié'){
                $publicatedSelected = ' checked';
                $draftSelected = '';
            } else {
                $draftSelected = ' checked';
                $publicatedSelected = '';
            }
        ?>
        <input type="radio" name="status" value="Brouillon" <?=$draftSelected?>> <label>Enregistrer en tant que brouillon</label>
        <input type="radio" name="status" value="Publié" <?=$publicatedSelected?>> <label>Publier</label>
    </div>
    <button class="btn btn-success">Sauvegarder</button>
    <?php
    //récupère le lien pour la redirection
        $link = $this->getLocation();
    ?>
	<a class="btn btn-primary" href="<?=$link;?>">Annuler</a>
</form>