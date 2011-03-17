<?php
  use_helper('I18N');
?>  

    
    </div><!-- wpbody -->
  </div><!-- wpcontent -->
</div><!-- wpwrap -->
<div id="footer">
<div id='sf_admin_theme_footer'>
  <?php echo __('Copyright &copy; %current_year% %site_name%. All rights reserved', array('%current_year%' => date('Y'), '%site_name%' => sfWpAdmin::getProperty('site'))); ?>
</div>

</div>
</body>
</html>

