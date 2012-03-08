<?php
/**
 * Table Definition for depenses_cat
 */
require_once 'M/DB/DataObject/Pluggable.php';

class DataObjects_Depenses_cat extends DB_DataObject_Pluggable 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'depenses_cat';        // table name
    public $id;                              // int(4)  primary_key not_null unsigned
    public $nom;                             // varchar(150)   not_null
    public $ratio_tva;                       // float   not_null
    public $compte;                          // varchar(30)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Depenses_cat',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nom' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'ratio_tva' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'compte' =>  DB_DATAOBJECT_STR,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             '' => null,
         );
    }

        
    function links() {
        // links generated from .links.ini file
        return array(

        );
    }
    function reverseLinks() {
        // reverseLinks generated from .links.ini file
        return array(
			'depenses:cat_id'=>'id',

        );
    }
    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public function __toString()
    {
      return $this->nom; 
    }
}
