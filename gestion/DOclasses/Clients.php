<?php
/**
 * Table Definition for clients
 */
require_once 'M/DB/DataObject/Pluggable.php';

class DataObjects_Clients extends DB_DataObject_Pluggable 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'clients';             // table name
    public $id;                              // int(4)  primary_key not_null unsigned
    public $intitule;                        // varchar(150)   not_null
    public $adresse;                         // varchar(150)   not_null
    public $ville;                           // varchar(100)   not_null
    public $codepostal;                      // varchar(12)   not_null
    public $tel;                             // varchar(20)   not_null
    public $email;                           // varchar(50)   not_null
    public $ref;                             // varchar(10)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Clients',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'intitule' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'adresse' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'ville' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'codepostal' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'tel' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'email' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'ref' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
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
			'factures:client_id'=>'id',
			'depenses:client_id'=>'id',

        );
    }
    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public function toHtml()
    {
      return '<strong>'.$this->intitule.'</strong><br />'.$this->adresse.'<br />'.$this->codepostal.' '.$this->ville;
    }
    public function __toString()
    {
      return $this->intitule; 
    }
}
