<?php

/**
 * Emprunt form.
 *
 * @package    gigm-materiel
 * @subpackage form
 * @author     Emilien Kenler
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewAssemblageForm extends AssemblageForm
{

  public function configure()
  {
    parent::configure();
    $this->setWidgets(array(
     'id' => new sfWidgetFormInputHidden(),
     'materiel_id' => new sfWidgetFormInputHidden(),
     'equipement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipement'), 'add_empty' => true)),
     'nombre' => new sfWidgetFormInputHidden(),
    ));

    $this->getValidator('nombre')->setOption('min',1);

    $this->widgetSchema->setNameFormat('assemblage[%s]');
  }

}
