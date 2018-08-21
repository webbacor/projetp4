<h2 class="color-blue" >Gestion les utilisateurs</h2>

<table class="table table-bordered table-striped">
    <thead class="head-table color-blue">
    <tr>
        <td>NOM</td>
        <td>ROLE</td>
        <td>ACTIONS</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user->name); ?></td>
            <td><?= htmlspecialchars($user->role); ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.users.edit&id=<?= $user->id; ?>">
                   Editer
                </a>
                <form action="?p=admin.users.delete" onsubmit="return deleteConfirm();" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $user->id; ?>">
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

