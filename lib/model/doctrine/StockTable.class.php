<?php

/**
 * StockTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StockTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object StockTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Stock');
    }

    public function getAllWhereDisponible()
    {
      $q = $this->createQuery('q')
        ->where('q.etat_id = ?',1)
        ->orderBy('q.nom ASC');

      return $q;
    }

    public function getAllWhereEmprunte()
    {
      $q = $this->createQuery('q')
        ->where('q.etat_id = ?',6)
        ->orderBy('q.nom ASC');

      return $q;
    }

    public function getAllWhereAssemble()
    {
      $q = $this->createQuery('q')
        ->where('q.etat_id = ?',5)
        ->orderBy('q.nom ASC');

      return $q;
    }
}