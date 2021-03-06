<?php

/**
 * EmpruntTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EmpruntTable extends Doctrine_Table
{

  /**
   * Returns an instance of this class.
   *
   * @return object EmpruntTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Emprunt');
  }

  public function getAllByUser($user_id)
  {
    $q = $this->createQuery('q')
        ->where('q.user_id = ?',$user_id)
        ->andWhere('q.rendu = ?',false)
        ->orderBy('q.created_at ASC');

    return $q;
  }

  public function getAllByGroup($groups)
  {
    $q = $this->createQuery('q')
        ->orderBy('q.created_at ASC');

    foreach($groups as $group)
    {
      $q = $q->orwhere('q.group_id = ?',$group->getId())
          ->andWhere('q.rendu = ?',false);
    }

    return $q;
  }

  public function getAllByMateriel($materiel_id)
  {
    $q = $this->createQuery('q')
        ->where('q.materiel_id = ?',$materiel_id)
        ->andWhere('q.rendu = ?',false)
        ->orderBy('q.created_at ASC');

    return $q;
  }

  public function getOneById($emprunt_id)
  {
    $q = $this->createQuery('q')
        ->where('q.id ='.$emprunt_id);

    return $q;
  }

}
