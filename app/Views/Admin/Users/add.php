<!--  View to add a user-->
<form method="post">
    <?= $form->input('name', 'Nom ou Pseudo *', null, true); ?>
   
    <?= $form->input('password', 'Mot de passe *',['type' => 'password'], true); ?>
    <?= $form->select('role', 'Rôle', ['user' => 'Utilisateur', 'admin' => 'administrateur' ]) ; ?>

    <button class="btn btn-success">Sauvegarder</button>
    <a class="btn btn-primary" href="?p=admin.users.index">Annuler</a>
</form>


