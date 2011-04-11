<?php

/**
 * assemblage actions.
 *
 * @package    gigm-materiel
 * @subpackage assemblage
 * @author     Emilien Kenler
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assemblageActions extends sfActions
{

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default','module');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->assemblage = AssemblageTable::getInstance()->getByEquipement($request->getParameter('equipement',null))->execute()->getData();
  }

}
