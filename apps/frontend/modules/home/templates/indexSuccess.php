<div class="haut">
  Haut
</div>
<div class="content">
  <ul>
    <?php foreach($disponible as $row): ?>
      <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?></li>
    <?php endforeach ?>
  </ul>
  <ul>
    <?php foreach($emprunte as $row): ?>
      <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?></li>
    <?php endforeach ?>
  </ul>
  <ul>
    <?php foreach($assemble as $row): ?>
      <li><?php echo $row->getNombre() ?>x <?php echo $row->getMateriel() ?></li>
    <?php endforeach ?>
  </ul>
</div>