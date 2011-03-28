<?php

/**
 * Emprunt
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    gigm-materiel
 * @subpackage model
 * @author     Emilien Kenler
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Emprunt extends BaseEmprunt
{

  public function rendre()
  {
    if(!$this->getRendu())
    {
      $this->setRendu(true);

      $stock_dispo = StockTable::getInstance()->findOneByMaterielIdAndEtatId($this->getMaterielId(),1);
      $stock_dispo->addNombre($this->getNombre());

      $emprunte = StockTable::getInstance()->findOneByMaterielIdAndEtatId($this->getMaterielId(),6);
      $emprunte->addNombre(-($this->getNombre()));

      $this->save();
      $stock_dispo->save();
      $emprunte->save();
    }
  }

  public function emprunter($form)
  {
    $materiel_id = $form->getValue('materiel_id');
    $nombre = $form->getValue('nombre');

    $dispo = StockTable::getInstance()->findOneByMaterielIdAndEtatId($materiel_id,1);
    if($dispo && $dispo->getNombre() >= $nombre)
    {
      $form->save();
      $dispo->addNombre(-($nombre));
      $dispo->save();

      $emprunte = StockTable::getInstance()->findOneByMaterielIdAndEtatId($materiel_id,6);
      if(!$emprunte)
      {
        $emprunte = new Stock();
        $emprunte->setNombre($nombre);
        $emprunte->setMaterielId($materiel_id);
        $emprunte->setEtatId(6);
      }
      else
      {
        $emprunte->addNombre($nombre);
      }
      $emprunte->save();
      return true;
    }
    else
      return false;
  }

}
