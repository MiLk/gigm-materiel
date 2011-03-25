<form method="post" action="<?php echo url_for('emprunt/emprunter') ?>">
  <?php foreach($form as $widget): ?>
  <?php echo $widget->render() ?>
  <?php endforeach ?>
  <input type="submit" value="Emprunter"/>
</form>
