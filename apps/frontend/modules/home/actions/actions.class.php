<?php

/**
 * home actions.
 *
 * @package    gigm-materiel
 * @subpackage home
 * @author     Emilien Kenler
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->disponible = StockTable::getInstance()->getAllWhereDisponible()->execute()->getData();
        $this->emprunte = StockTable::getInstance()->getAllWhereEmprunte()->execute()->getData();
        $this->assemble = StockTable::getInstance()->getAllWhereAssemble()->execute()->getData();

        $this->mes_emprunts = EmpruntTable::getInstance()->getAllByUser($this->getUser()->getGuardUser()->getPrimaryKey())->execute()->getData();
    }

}
