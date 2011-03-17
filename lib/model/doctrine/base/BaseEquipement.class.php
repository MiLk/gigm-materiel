<?php

/**
 * BaseEquipement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $nom
 * @property string $description
 * @property Doctrine_Collection $Assemblage
 * 
 * @method string              getNom()         Returns the current record's "nom" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getAssemblage()  Returns the current record's "Assemblage" collection
 * @method Equipement          setNom()         Sets the current record's "nom" value
 * @method Equipement          setDescription() Sets the current record's "description" value
 * @method Equipement          setAssemblage()  Sets the current record's "Assemblage" collection
 * 
 * @package    gigm-materiel
 * @subpackage model
 * @author     Emilien Kenler
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseEquipement extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('equipement');
        $this->hasColumn('nom', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Assemblage', array(
             'local' => 'id',
             'foreign' => 'equipement_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($timestampable0);
        $this->actAs($softdelete0);
    }
}