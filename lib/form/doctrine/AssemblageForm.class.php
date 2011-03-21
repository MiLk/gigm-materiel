<?php

/**
 * Assemblage form.
 *
 * @package    gigm-materiel
 * @subpackage form
 * @author     Emilien Kenler
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssemblageForm extends BaseAssemblageForm
{
  public function configure()
  {
    unset($this['updated_at'],$this['created_at']);
  }
}
