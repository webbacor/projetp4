<h2 class="color-blue" >Gestion les commentaires</h2>


<table class="table table-bordered table-striped">
    <thead class="head-table color-blue">
    <tr>
        <td>ID</td>
        <td>COMMENTAIRES</td>
        <td>AUTEUR</td>
        <td>SIGNALEMENT(s)</td>
        <td>ACTIONS</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= $comment->getComId(); ?></td>
            <td><?= $comment->getContent(); ?></td>
            <td><a href="?p=admin.users.edit&id=<?= $comment->usr_id; ?>">
                   <?= ' ' . $comment->getName(); ?></a>
            </td>
            <td><span class="badge background-blue" data-toggle="tooltip" data-placement="right"
                title="Nombre de signalement pour ce commentaire"> <?= $comment->reported; ?> </span></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.comments.edit&comId=<?= $comment->getComId(); ?>">
                    Editer
                </a>
                <form action="?p=admin.comments.delete" onsubmit="return deleteConfirm();" method="post" style="display: inline;">
                    <input type="hidden" name="comId" value="<?= $comment->getComId(); ?>">
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Supprimer
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

