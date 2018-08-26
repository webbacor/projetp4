<?php
// loop tickets
foreach ($posts as $billet): ?>
    <article>
        <div class="panel panel-secondary">
            <div class="panel-heading ">
                <h2 class="panel-title panel-title-perso"><a href="<?= $billet->getUrl() ?>"><?= $billet->getTitle() ?></a></h2>
            </div>
            <div class="panel-body">
                <p class="billet-contenu"><?php echo $billet->getExtract(360) ?></p>
                <p><a href="<?php echo $billet->getURL() ?>"><span>Voir la suite et commentez...</span></a></p>
            </div>
            <?php
            // link for the administrator
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                    <div class="panel-footer">
                        <a href="?p=admin.billets.edit&id=<?= $billet->getId() . '&from=billets.index' ; ?>"><span class="glyphicon glyphicon-edit"></span> Editer</a>
                    </div>
             <?php } ?>
        </div>
    </article>
<?php endforeach ?>
