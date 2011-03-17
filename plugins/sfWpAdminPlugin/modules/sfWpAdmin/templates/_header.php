<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_global.css') ?>
<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin.css') ?>
<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_colors.css') ?>
<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_sf.css') ?>

<div id="wpwrap">
  <div id="wpcontent">
    <div id="wphead">
    <h1>
      <?php echo sfWpAdmin::getProperty('site') ?>

      <span id="viewsite">
        <a href="<?php echo sfWpAdmin::getProperty('site_url') ?>" target="_blank">website</a>
      </span>
    </h1>
  </div>
  
  <?php if($sf_user->isAuthenticated()): ?>
    <div id="user_info">
      <p>Hello
      <?php //echo $sf_user->getUserName() ?> 
      <?php echo link_to('Logout', sfWpAdmin::getProperty('logout_route')) ?></p>
    </div>
  <?php endif ?>
  
  <ul id="dashmenu">
    <li><?php echo link_to('Dashboard', sfWpAdmin::getProperty('homepage', '@homepage'), 'class='. (($sf_request->getUri() == url_for('@homepage', true))? 'current': '')) ?></li>
  </ul>

  <ul id="adminmenu">
    <?php foreach (sfWpAdmin::getItems() as $name => $item): ?>
      <?php if(sfWpAdmin::hasCredential($item)): ?>
        <li><?php echo sfWpAdmin::menuLink($name, $item) ?></li>
      <?php endif ?>
    <?php endforeach; ?>
  </ul>
  
  <ul id="sidemenu">
    <?php foreach (sfWpAdmin::getSubItems() as $name => $item): ?>
      <?php if(sfWpAdmin::hasCredential($item)): ?>
        <li><?php echo sfWpAdmin::menuLink($name, $item) ?></li>
      <?php endif ?>
    <?php endforeach ?>
  </ul>

  <ul id="submenu">
    <?php foreach (sfWpAdmin::getSubMenu() as $name => $menu_sub): ?>
      <?php if(sfWpAdmin::hasCredential($item)): ?>
        <li><?php echo sfWpAdmin::subMenuLink($name, $menu_sub); ?></li>
      <?php endif ?>
    <?php endforeach; ?>
  </ul>
  <div id="wpbody">