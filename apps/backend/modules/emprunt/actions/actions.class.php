<?php

require_once dirname(__FILE__).'/../lib/empruntGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/empruntGeneratorHelper.class.php';

/**
 * emprunt actions.
 *
 * @package    gigm-materiel
 * @subpackage emprunt
 * @author     Emilien Kenler
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empruntActions extends autoEmpruntActions
{
  public function executeBatchRendre(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $q = EmpruntTable::getInstance()->createQuery('q')
      ->whereIn('q.id', $ids);

    foreach ($q->execute() as $emprunt)
    {
      $emprunt->rendre();
    }

    $this->getUser()->setFlash('notice', 'Les matériels sélectionnés ont été rendus.');

    $this->redirect('emprunt');
  }

  public function executeListRendre(sfWebRequest $request)
  {
    $emprunt = $this->getRoute()->getObject();
    $emprunt->rendre();

    $this->getUser()->setFlash('notice', 'Le matériel sélectionné a été rendu.');

    $this->redirect('emprunt');
  }
}
