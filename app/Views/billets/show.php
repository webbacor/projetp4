<?php
// Ajouter un commentaire si posté
if (!empty($_POST)){

	$commentTable = app::getInstance()->getTable('comment');

	$sql = [	'content' => htmlspecialchars($_POST['comment']),
				'bil_id'  => $_POST['billetID'],
				'usr_id'  => $_POST['usrID']
			];	
	
	$res = $commentTable->create($sql);
	
	$comments = $commentTable->getComments($_GET['id']);
}
?>
    <!-- panneau pour le chapitre -->
    <div class="panel panel-secondary">
        <div class="panel-heading ">
            <span class ="panel-title panel-title-perso"><?= $billet->getTitle(); ?></span>
        </div>

        <div class="panel-body">
            <p class="billet-contenu"><?= $billet->getContent(); ?></p>
        </div>

        <!-- Edition lien pour l'administrateur -->
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <div class="panel-footer">
                <a href="?p=admin.billets.edit&id=<?= $billet->getId() . '&from=billets.show' ; ?>">
                    <span class="glyphicon glyphicon-edit"></span> Editer
                </a>
            </div>
        <?php } ?>
    </div> <!-- fin du panneau -->

	<?php
    // publier un commentaire disponible uniquement pour les utilisateurs authentifiés
	if (isset($_SESSION['auth'])){?>
        <form method="post">
            <input type="hidden" name="usrID" value="<?=$_SESSION['auth']?>">
            <input type="hidden" name="billetID" value="<?= $billet->getId(); ?>">
            <div class="form-group">
                <label for="comment">Commentaire :</label>
                <textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Saisissez ici votre commentaire ..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Poster</button>
        </form>
        <br/>
    <?php } else {
	// si l'utilisateur n'est pas authentifié, il a un lien pour le faire.
		$param = "?p=users.login&billetId=" .$billet->getId(); ?>
		<div class="alert alert-warning">Vous devez être connecté pour poster un commentaire. <a href="<?php echo $param ; ?>" class="btn btn-warning"></span> Connexion</a>
		</div>
	<?php } ?>
    <!--Total commentaires-->
	<div class="alert alert-success">
		<?php
		$totalComments = count($comments);
		$commentSpell = 'Commentaire.';
		if ($totalComments > 1){
			$commentSpell = 'Commentaires.';
		}
	?>
			<strong><?= $totalComments . ' ' .  $commentSpell ?></strong>
	</div>

	<!-- boucles de commentaires -->
	<?php foreach ($comments as $comment): ?>
	<div class="alert alert-info">
		<?php
		// utilisation de la classe IntlDateFormatter pour obtenir une "date française"
		$mask = "EEEE d MMMM YYYY ";

		$date = new DateTime($comment->commentDate);
		
		?>
		<span class="date-comment">

            <?= "Posté le " . IntlDateFormatter::formatObject($date,$mask) . " par " ;?>
            <strong><?= $comment->getName() . " "; ?></strong>
		</span>
		<p>

			<?= $comment->getContent(); ?>
		</p>
		
		<p>
		<?php
		// Pour signaler un commentaire, l'utilisateur doit être connecté
		if (isset($_SESSION['auth'])) {
			
			// Nombre total de rapports pour ce commentaire
			$total = $this->report->totalReported($comment->getComId());
			
			// Est-ce que l'utilisateur rapporte déjà ce commentaire?
			$reportId = $this->report->isReported($comment->comId, $_SESSION['auth']);
			
			if ($reportId) {
				$param = "&reportId=" . $reportId . "&id=" . $billet->getId(); ?>
				<span class="glyphicon glyphicon-eye-close"></span>
				<a href="?p=reports.cancel<?php echo $param ; ?>"> Annuler le signalement</a>	
				<?php
			} else {
				$param = "&id=" . $billet->getId(). "&comId=". $comment->getComId() . "&userId=" . $_SESSION['auth'];				
			?>
				<span class="glyphicon glyphicon-eye-open"></span>
				<a href="?p=reports.add<?php echo $param ; ?>"> Signaler le commentaire</a>
				
			<?php
			} ?> 		
		
			<!-- total rapport -->
			<span class="badge badge-white" data-toggle="tooltip" data-placement="right"
                  title="Nombre de signalement pour ce commentaire">
            <?= $total ?></span>

            <!-- Modifier le lien pour admin -->
            <?php
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <div>
                    <a href="?p=admin.comments.edit&comId=<?= $comment->getComId() . '&from=billets.show&billetId='
                    .$billet->getId(); ?>">
                        <span class="glyphicon glyphicon-edit"></span> Editer
                    </a>
                </div>
            <?php } // fin utilisateur administrateur ?>

        <?php } // fin connection utilisateur ?>

		</p>
	</div>
	<?php endforeach // fin boucle des commentaires?>
