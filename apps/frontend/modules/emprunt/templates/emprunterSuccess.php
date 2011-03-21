<form method="post" action="<?php echo url_for('emprunt/emprunter') ?>">
    <?php
        echo $form->renderHiddenFields();
        echo $form;
    ?>
    <input type="submit" value="Emprunter"/>
</form>
