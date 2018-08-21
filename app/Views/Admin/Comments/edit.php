<form method="post">

    <?= $form->input('content', 'Contenu', ['type' => 'tinytextarea'], true); ?>
    <button class="btn btn-success">Sauvegarder</button>

    <?php
    // récupère le lien pour la redirection
    $link = $this->getLocation();
    ?>
    <a class="btn btn-primary" href="<?=$link;?>">Annuler</a>
</form>