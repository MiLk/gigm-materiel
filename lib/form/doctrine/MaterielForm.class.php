<?php

/**
 * Materiel form.
 *
 * @package    gigm-materiel
 * @subpackage form
 * @author     Emilien Kenler
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MaterielForm extends BaseMaterielForm
{
  public function configure()
  {
    unset($this['created_at'],$this['update_at']);
  }
}
