<?php use_helper('Date') ?>
<ul>
    <?php foreach($emprunts as $row): ?>
      <li><strong><?php echo $row->getUser() ?></strong> a emprunté <?php echo $row->getNombre() ?>x <strong><?php echo $row->getMateriel() ?></strong> pour le groupe <strong><?php echo $row->getGroup() ?></strong> le <strong><?php echo ucfirst(format_date($row->getCreatedAt(),'P','fr')) ?></strong></li>
    <?php endforeach ?>
</ul>
<a href="<?php echo url_for('homepage') ?>">Retour</a>
