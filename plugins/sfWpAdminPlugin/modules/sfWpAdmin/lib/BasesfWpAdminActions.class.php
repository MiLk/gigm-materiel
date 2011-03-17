<?php
/**
 * sfAdminDash base actions.
 *
 * @package    plugins
 * @subpackage sfAdminDash
 * @author     Ivan Tanev aka Crafty_Shadow @ webworld.bg <vankata.t@gmail.com>
 * @version    SVN: $Id: BasesfAdminDashActions.class.php 25203 2009-12-10 16:50:26Z Crafty_Shadow $
 */ 
class BasesfWpAdminActions extends sfActions
{
 
  public function executeLogin(sfWebRequest $request)
  {
    $homepage = sfWpAdmin::getProperty('homepage', '@homepage');
    
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect($homepage);
    }
    
    $login_form_class = sfWpAdmin::getProperty('login_form_class', 'sfGuardFormSignin');

    $this->form = new $login_form_class();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('signin'));
      if ($this->form->isValid())
      {
        $values = $this->form->getValues();
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

        return $this->redirect($homepage);
      }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }

    $this->setLayout(false);
  }
  
  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->signOut();

    $this->redirect(sfWpAdmin::getProperty('login_route'));
  }
}