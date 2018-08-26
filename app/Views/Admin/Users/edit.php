<!--display for user edition-->
<form method="post">
    <?= $form->input('name', 'Nom ou Pseudo *', null, true); ?>
    
    <?= $form->select('role', 'Rôle', ['user' => 'Utilisateur', 'admin' => 'administrateur' ]) ; ?>

    <?php
        // l'utilisateur est-il verrouillé?
        if ($form->getValue('isLocked') == 1){
            $chkIsLocked = ' checked';
        } else {
            $chkIsLocked = '';
        }
        ?>
    
    <button class="btn btn-success">Sauvegarder</button>
    <a class="btn btn-primary" href="?p=admin.users.index">Annuler</a>
</form>


