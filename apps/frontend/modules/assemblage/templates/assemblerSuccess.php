<form method="post" action="<?php echo url_for('assemblage/assembler?emprun='.$emprunt_id) ?>">
  <?php foreach($form as $widget): ?>
    <?php echo $widget->render() ?>
  <?php endforeach ?>
  <input type="submit" value="Assembler"/>
</form>