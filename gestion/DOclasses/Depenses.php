<?php
/**
 * Table Definition for depenses
 */
require_once 'M/DB/DataObject/Pluggable.php';

class DataObjects_Depenses extends DB_DataObject_Pluggable 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'depenses';            // table name
    public $id;                              // int(4)  primary_key not_null unsigned
    public $titre;                           // varchar(250)   not_null
    public $cat_id;                          // int(4)   not_null unsigned
    public $date;                            // date   not_null
    public $montant;                         // float   not_null
    public $filename;                        // varchar(250)   not_null
    public $client_id;                       // int(4)  
    public $date_rbt;                        // date  
    public $mode_rbt;                        // varchar(15)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Depenses',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'titre' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'cat_id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'date' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_NOTNULL,
             'montant' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'filename' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'client_id' =>  DB_DATAOBJECT_INT,
             'date_rbt' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE,
             'mode_rbt' =>  DB_DATAOBJECT_STR,
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
			'cat_id'=>'depenses_cat:id',
			'client_id'=>'clients:id',

        );
    }
    function reverseLinks() {
        // reverseLinks generated from .links.ini file
        return array(

        );
    }
    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    
    public $fb_FieldsToRender = array('client_id'=>'Avancé par','date_rbt'=>'Remboursé','mode_rbt'=>'Type de remboursement');
    public $fb_linkOrderFields = array('date DESC');
        
    public function _getPluginsDef()
    {
      return array('upload'=>array('filename'=>array('path'=>'')));
    }
    public function getSingleMethods()
    {
      return array('download'=>array('title'=>'Télécharger'));
    }
    public function getBatchMethods()
    {
      return array('total'=>array('title'=>'Calcul total'),
        'exportfichiers'=>array('title'=>'Export fichiers'));
    }
    public function exportfichiers()
    {
      while($this->fetch()) {
        $path = APP_ROOT.'export/'.date('Ym',strtotime($this->date)).'/';
        if(!is_dir($path)) mkdir($path);
        $dest = $path.'F'.$this->id.'.pdf';

        copy(APP_ROOT.WEB_FOLDER.'/upload/'.$this->filename,$path.'DEP'.Strings::stripify($this->titre).'.'.FileUtils::getFileExtension($this->filename));
      }
    }
    public function total()
    {
      while($this->fetch()) {
        $tot+=$this->montant;
      }
      $this->say('Total dépenses : '.$tot.' &euro;');
    }
    public function preGenerateForm($fb)
    {
      if(empty($this->id)) {
        $this->date = date('Y-m-d');
      }
      return parent::preGenerateForm($fb);
    }
    public function download()
    {
      $this->serve('filename',date('ymd',strtotime($this->date)).Strings::stripify($this->titre).'.'.FileUtils::getFileExtension($this->filename));
    }
    
}
