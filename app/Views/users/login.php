
<?php
//affichage  pour la connexion de l'utilisateur
// alerte pour les erreurs
if ($errors) { ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
        <?php } ?>

<form method="post">
    <?= $form->input('userName', 'Pseudo *', null, true); ?>
    <?= $form->input('password', 'Mot de passe *', ['type' => 'password'], true); ?>

    <button class="btn btn-primary">Envoyer</button>
   
</form>
<div>
    <br>
    <form action="?p=users.add" method="post">
        <button class="btn btn-success">S'inscrire</button>
    </form>
</div>

<br/>
<br/>
