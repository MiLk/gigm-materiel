<?php use_helper('Date') ?>
<ul>
    <?php foreach($emprunts as $row): ?>
      <li><?php echo $row->getUser() ?> a emprunté <?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?> le <?php echo ucfirst(format_date($row->getCreatedAt(),'P','fr')) ?></li>
    <?php endforeach ?>
</ul>
<a href="<?php echo url_for('homepage') ?>">Retour</a>