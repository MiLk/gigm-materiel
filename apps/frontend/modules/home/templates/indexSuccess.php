<div id="home">
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
                        <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?></li>
            <?php endforeach ?>
                    </ul>
                    <ul class="assemblage">
            <?php foreach($assemble as $row): ?>
                            <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>