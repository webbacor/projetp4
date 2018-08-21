<h2 class="color-blue">Gestion des billets</h2>

<p>
    <a href="?p=admin.billets.add" class="btn btn-success"></span> Ajouter</a>
</p>

<table class="table table-bordered table-striped">
    <thead class="head-table color-blue">
    <tr>
        <td>CHAPITRE</td>
        <td>TITRES</td>
        <td>MODE</td>
        <td>Editer ou supprimer</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $billet): ?>
        <tr>
            <td><?= $billet->getChapter(); ?></td>
            <td><?= $billet->getTitle(); ?></td>
            <td><?= $billet->getStatus(); ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.billets.edit&id=<?= $billet->getId(); ?>">
                    Editer
                </a>
                <form action="?p=admin.billets.delete" method="post"  onsubmit="return deleteConfirm();" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $billet->getId(); ?>">
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Supprimer
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>