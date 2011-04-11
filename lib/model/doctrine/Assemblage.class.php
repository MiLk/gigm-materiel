<?php

/**
 * Assemblage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    gigm-materiel
 * @subpackage model
 * @author     Emilien Kenler
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Assemblage extends BaseAssemblage
{

  public function assembler($form)
  {
    $emprunt_id = $form->getValue('emprunt_id');
    $materiel_id = $form->getValue('materiel_id');
    $equipement_id = $form->getValue('equipement_id');
    $nombre = $form->getValue('nombre');

    $stock = EmpruntTable::getInstance()->getOneById($emprunt_id);
    $stock->rendre();

    $form->save();
  }

}
