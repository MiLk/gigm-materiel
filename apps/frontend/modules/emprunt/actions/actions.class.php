<?php

/**
 * emprunt actions.
 *
 * @package    gigm-materiel
 * @subpackage emprunt
 * @author     Emilien Kenler
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empruntActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeEmprunter(sfWebRequest $request)
  {
     $this->form = new NewEmpruntForm();
     $this->form->setUser($this->getUser()->getGuardUser());
     $this->form->setMaterielId($request->getParameter('materiel',null));

     $this->form->bind($request->getParameter($this->form->getName()),$request->getFiles($this->form->getName()));
     if($this->form->isValid())
     {
         $dispo = StockTable::getInstance()->findOneByMaterielIdAndEtatId($this->form->getObject()->getMaterielId(),1);
         if($dispo->getNombre() >= $this->form->getObject()->getNombre())
         {
             $this->form->save();
             $dispo->addNombre(-($this->form->getObject()->getNombre()));
             $dispo->save();
         }
     }
   }
}
