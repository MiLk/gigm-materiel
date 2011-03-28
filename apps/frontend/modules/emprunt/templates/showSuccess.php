<?php use_helper('Date') ?>
<ul>
  <?php foreach($emprunts as $row): ?>
    <li><?php echo $row->getUser() ?> a emprunté <?php echo $row->getNombre() ?>x <?php $row->getMateriel() ?> le <?php ucfirst(format_date($row->getCreatedAt(),'P','fr')) ?></li>
  <?php endforeach ?>
</ul>
