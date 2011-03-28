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

                $materiel_id = $this->form->getValue('materiel_id');
                $nombre = $this->form->getValue('nombre');

                /*
                 * Debut de code à placer dans le model
                 */
                $dispo = StockTable::getInstance()->findOneByMaterielIdAndEtatId($materiel_id,1);
                if($dispo && $dispo->getNombre() >= $nombre)
                {
                    $this->form->save();
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
                    $this->getUser()->setFlash('notice','Vous avez emprunté '.$nombre.' '.$emprunt->getMateriel().'.');
                }
                else
                    $this->getUser()->setFlash('error','Impossible d\'emprunter '.$nombre.' '.$emprunt->getMateriel().', '.$dispo->getNombre().' restants.');
                /*
                 * Fin de code à placer dans le model
                 */
                $this->redirect('homepage');
            }
        }
    }

    public function executeRendre(sfWebRequest $request)
    {
        $this->redirectUnless($emprunt = EmpruntTable::getInstance()->find($request->getParameter('emprunt',null)),'homepage');
        /*
         * Debut de code à placer dans le model
         */
        $emprunt->setRendu(true);

        $stock_dispo = StockTable::getInstance()->findOneByMaterielIdAndEtatId($emprunt->getMaterielId(),1);
        $stock_dispo->addNombre($emprunt->getNombre());

        $emprunte = StockTable::getInstance()->findOneByMaterielIdAndEtatId($emprunt->getMaterielId(),6);
        $emprunte->addNombre(-($emprunt->getNombre()));

        $emprunt->save();
        $stock_dispo->save();
        $emprunte->save();
        /*
         * Fin de code à placer dans le model
         */

        $this->redirect('homepage');
    }

}
