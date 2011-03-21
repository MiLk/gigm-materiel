<?php

/**
 * Emprunt form.
 *
 * @package    gigm-materiel
 * @subpackage form
 * @author     Emilien Kenler
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewEmpruntForm extends EmpruntForm
{

    public function configure()
    {
        parent::configure();
        $this->setWidgets(array(
         'id' => new sfWidgetFormInputHidden(),
         'materiel_id' => new sfWidgetFormInputHidden(),
         'user_id' => new sfWidgetFormInputHidden(),
         'nombre' => new sfWidgetFormInputText(),
         'rendu' => new sfWidgetFormInputHidden(),
        ));

        $this->getWidget('rendu')->setDefault(false);
    }

}
