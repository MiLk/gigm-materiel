<?php
/**
* sfAdminDash main class
*
* @package    plugins
* @subpackage sfAdminDash
* @author     kevin
* @version    SVN: $Id: sfAdminDash.class.php 25249 2009-12-11 09:50:42Z Crafty_Shadow $
*/ 
class sfWpAdmin
{
  public static function addAssets()
  {
    $context = sfContext::getInstance();
    
    $context->getResponse()->addStylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_global.css');
    $context->getResponse()->addStylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin.css');
    $context->getResponse()->addStylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_colors.css');
    $context->getResponse()->addStylesheet(sfWpAdmin::getProperty('web_dir').'/css/admin_sf.css');
  }
  
  public static function getProperty($name, $default = null)
  {
    return sfConfig::get('app_sf_wp_admin_'.$name, $default);
  }
  
  public static function getItems()
  {
    return self::getProperty('items', array());
  }
  
  public static function getSubItems()
  {
    return self::getProperty('sub_items', array());
  }

  public static function checkChild($childs)
  {
    foreach ($childs as $child)
      if (self::checkSubChild($child)) return true;

    return false;
  }

  /**
  * Check to see if a menu subitem is active
  *
  * @param  none
  * @return bool true, if curent action/module matched, false otherwise
  */
  public static function checkArray($module, $action, $array = array())
  {
    foreach ($array as $child)
      if($module == $child['module'] && $action == $child['action'])
        return true;

      return false;
  }

  /**
  * Check to see if this menu subitem is active
  *
  * @param  none
  * @return bool true, if curent action/module and parameters matched, false otherwise
  */
  public static function checkSubChild($child)
  {
    $sf_params = sfContext::getInstance()->getRequest()->getParameterHolder();
    $child['alias'][] = array("module" => $child['module'], "action" => $child['action']);

    if (self::checkArray($sf_params->get('module'),$sf_params->get('action'), $child['alias']))
    {
      if (sizeof($child['parameters']) > 0)
      {
        $return = true;
        foreach ($child['parameters'] as $key => $value)
        {
          if ($sf_params->get($key,0) != $value) $return = false;
        }
        if ($return) return true;
      }
      else return true;
    }

    return false;
  }

  /**
  * Returns seleted subitem from menu
  *
  * @param  none
  * @return array
  */
  public static function getSubMenu()
  {
    foreach (self::getItems() as $item)
    {
      if (self::checkChild($item))
      {
        return $item;
      }
    }
    
    foreach (self::getSubItems() as $item)
    {
      if (self::checkChild($item))
      {
        return $item;
      }
    }
    
    return array();
  }

  /**
  * Generates menu route
  *
  * @return string, route for the menu item
  */
  public static function menuUrl($item)
  {
    if (array_key_exists('link',$item))
      return $item['link'];

    $params = array();
    foreach ($item['parameters'] as $key => $value)
      $params[] .= $key. '=' . $value;

    return $item['module'].'/'.$item['action'] . ($params?'?'.implode("&",$params):'');
  }

  /**
  * Generates link for menu item
  *
  * @return string, link for the menu item
  */
  public static function menuLink($name, $item)
  {
    foreach($item as $child) return link_to($name, self::menuUrl($child), self::checkChild($item) ? "class=current" : '');
  }

  /**
  * Generates link for submenu item
  *
  * @return string, link for the submenu item
  */
  public static function subMenuLink($name, $item)
  {
    return link_to($name, self::menuUrl($item), self::checkSubChild($item) ? "class=current" : '');
  }
  
  public static function hasCredential($item)
  {
    if(!isset($item['credentials'])) return true;
    
    $user = sfContext::getInstance()->getUser();
    
    $credential = $item['credentials'];

    return $user->hasCredential($credential);
  }
}