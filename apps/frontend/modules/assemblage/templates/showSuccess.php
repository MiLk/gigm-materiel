<?php use_helper('Date') ?>
  <ul>
    <?php foreach($assemblage as $row): ?>
      <li><?php echo $row->getNombre() ?>x <?php echo ucfirst($row->getMateriel()) ?> assemblés sur <strong><?php echo ucfirst($row->getEquipement()) ?></strong> le <?php echo ucfirst(format_date($row->getCreatedAt(),'P','fr'))?></li>
    <?php endforeach ?>
  </ul>
<a href="<?php echo url_for('homepage') ?>">Retour</a>