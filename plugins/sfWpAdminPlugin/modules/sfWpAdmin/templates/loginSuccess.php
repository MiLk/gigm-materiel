<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_login.css') ?>
<?php use_stylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_colors.css') ?>
<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body class="login">
  <div id="login">
    <h1><a title="" href="/"><?php echo sfWpAdmin::getProperty('site') ?></a></h1>
  
    <?php if ($form->hasErrors()): ?>  
      <div id="login_error">  
        <strong>ERROR</strong>: <br/>
        <?php echo $form->renderGlobalErrors() ?>
        <?php foreach ($form->getErrorSchema()->getErrors() as $name => $error): ?>
          <?php echo $form[$name]->renderLabelName().': '.$error ?><br/>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  
  
    <form action"<?php echo url_for('sfWpAdmin/login') ?>" id=loginform" method="post">
      <p>
        <label>
          <?php echo $form['username']->renderLabelName() ?><br/>
          <?php echo $form['username']->render(array('class'=>'input','size'=>'20','id'=>'user_login')); ?>
        </label>
      </p>
      <p>
        <label>
          <?php echo $form['password']->renderLabelName() ?><br/>
          <?php echo $form['password']->render(array('class'=>'input','size'=>'20','id'=>'user_pass')); ?>
        </label>
      </p>
      <p class="forgetmenot">
       <label for="remember"><?php echo $form['remember'] ?> <?php echo $form['remember']->renderLabelName() ?></label></p>
      <p class="submit"> 
        <input type="submit" tabindex="100" id="wp-submit" value="<?php echo _('Log In') ?>" name="commit">
      </p>
    </form>

    <p id="nav">
      <a title="Password Lost and Found" href="#">Lost your password?</a>
    </p>

  </div>
  
  <p id="backtoblog"><a title="Are you lost?" href="/">&laquo; Back to site</a></p>
</body>
</html>
