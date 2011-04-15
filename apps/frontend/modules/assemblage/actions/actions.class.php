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

  public function executeAssembler(sfWebRequest $request)
  {
    $emprunt = EmpruntTable::getInstance()->find($request->getParameter('emprunt',null));

    $assemblage = new Assemblage();
    if(!$request->isMethod('post'))
    {
      $assemblage->setMaterielId($emprunt->getMaterielId());
      $assemblage->setNombre($emprunt->getNombre());
    }

    $this->form = new NewAssemblageForm($assemblage);
    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()),$request->getFiles($this->form->getName()));
      if($this->form->isValid())
      {
        if($assemblage->assembler($this->form,$emprunt))
          $this->getUser()->setFlash('notice','Vous avez assemblé '.$assemblage->getNombre().' '.$assemblage->getMateriel().' sur '.$assemblage->getEquipement().'.');
        else
          $this->getUser()->setFlash('error','Impossible d\'assembler '.$assemblage->getNombre().' '.$assemblage->getMateriel().' sur '.$assemblage->getEquipement().'.');

        $this->redirect('homepage');
      }
    }
  }

}
