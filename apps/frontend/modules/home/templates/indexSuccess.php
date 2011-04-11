<div id="home">

    <?php if ($sf_user->hasFlash('notice')): ?>
        <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php endif ?>

    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
    <?php endif ?>
    <div class="haut">
        Mes emprunts :
        <ul>
            <?php foreach($mes_emprunts as $row): ?>
                <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?> - <a href="<?php echo url_for('emprunt/rendre?emprunt='.$row->getPrimaryKey()) ?>">Rendre</a></li>
            <?php endforeach ?>
        </ul>
     </div>
     <div class="content">
        <ul class="disponible">
            <?php foreach($disponible as $row): ?>
                <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?> - <a href="<?php echo url_for('emprunt/emprunter?materiel='.$row->getMaterielId()) ?>">Emprunter</a></li>
            <?php endforeach ?>
        </ul>
        <ul class="emprunt">
            <?php foreach($emprunte as $row): ?>
                        <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?> - <a href="<?php echo url_for('emprunt/show?materiel='.$row->getMaterielId()) ?>">Consulter les emprunts</a></li>
            <?php endforeach ?>
        </ul>
        <ul class="assemblage">
            <?php foreach($assemble as $row): ?>
                            <li><?php echo $row->getEquipement() ?> - <a href="<?php echo url_for('assemblage/show?equipement='.$row->getEquipementId()) ?>">Consulter les assemblages</a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>