<?php use_helper('Date') ?>
  <ul>
    <?php foreach($assemblage as $row): ?>
      <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?> assemblés sur <?php echo $row->getEquipement() ?> le <?php echo ucfirst(format_date($row->getCreatedAt(),'P','fr'))?></li>
    <?php endforeach ?>
  </ul>
<a href="<?php echo url_for('homepage') ?>">Retour</a>