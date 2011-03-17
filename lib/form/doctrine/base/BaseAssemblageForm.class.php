<?php

/**
 * Assemblage form base class.
 *
 * @method Assemblage getObject() Returns the current form's model object
 *
 * @package    gigm-materiel
 * @subpackage form
 * @author     Emilien Kenler
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssemblageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'materiel_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materiel'), 'add_empty' => true)),
      'equipement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipement'), 'add_empty' => true)),
      'nombre'        => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'materiel_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Materiel'), 'required' => false)),
      'equipement_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipement'), 'required' => false)),
      'nombre'        => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('assemblage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Assemblage';
  }

}
