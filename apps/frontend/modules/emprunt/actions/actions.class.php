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
    $this->redirect('home','module');
  }

  public function executeEmprunter(sfWebRequest $request)
  {
    $emprunt = new Emprunt();
    $emprunt->setUser($this->getUser()->getGuardUser());
    $emprunt->setRendu(false);
    if(!$request->isMethod('post'))
      $emprunt->setMaterielId($request->getParameter('materiel',null));

    $this->form = new NewEmpruntForm($emprunt);
    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()),$request->getFiles($this->form->getName()));
      if($this->form->isValid())
      {

        if($emprunt->emprunter($this->form))
          $this->getUser()->setFlash('notice','Vous avez emprunté '.$nombre.' '.$this->getMateriel().'.');
        else
          $this->getUser()->setFlash('error','Impossible d\'emprunter '.$nombre.' '.$this->getMateriel().', '.$dispo->getNombre().' restants.');

        $this->redirect('homepage');
      }
    }
  }

  public function executeRendre(sfWebRequest $request)
  {
    $this->redirectUnless($emprunt = EmpruntTable::getInstance()->find($request->getParameter('emprunt',null)),'homepage');

    $emprunt->rendre();

    $this->getUser()->setFlash('notice','Vous avez rendu '.$emprunt->getNombre().' '.$emprunt->getMateriel().'.');

    $this->redirect('homepage');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->emprunts = EmpruntTable::getInstance()->getAllByMateriel($request->getParameter('materiel_id',null))->execute()->getData();
  }

}
