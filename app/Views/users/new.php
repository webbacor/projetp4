<?php
//affichage pour ajouter un utilisateur

 if($errors): ?>
    <div class="alert alert-danger">
        <?= $messageError ;?>
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('userName', 'Nom ou Pseudo *', null, true); ?>
    <?= $form->input('password', 'Mot de passe *', ['type' => 'password'], true); ?>
    <?= $form->input('password2', 'Confirmez le Mot de passe *', ['type' => 'password'], true); ?>
    <input type="hidden" name="role" value="user">
    <button class="btn btn-primary">Créer</button>
</form>


