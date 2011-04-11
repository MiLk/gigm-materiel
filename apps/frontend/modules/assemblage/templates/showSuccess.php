<?php use_helper('Date') ?>
  <ul>
    <?php foreach($assemblage as $row): ?>
      <li><?php echo $row->getNombre() ?>x <strong><?php echo $row->getMateriel() ?></strong> assemblés sur <strong><?php echo ucfirst($row->getEquipement()) ?></strong> le <strong><?php echo ucfirst(format_date($row->getCreatedAt(),'P','fr'))?></strong></li>
    <?php endforeach ?>
  </ul>
<a href="<?php echo url_for('homepage') ?>">Retour</a>