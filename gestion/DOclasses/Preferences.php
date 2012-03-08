<?php
/**
 * Table Definition for preferences
 */

class DataObjects_Preferences extends DB_DataObject_Pluggable 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'preferences';         // table name
    public $id;                              // int(4)  primary_key not_null unsigned
    public $var;                             // varchar(50)   not_null
    public $description;                     // mediumtext  
    public $val;                             // text  
    public $type;                            // varchar(30)   not_null
    public $typeargs;                        // mediumtext  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Preferences',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'var' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'description' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_TXT,
             'val' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_TXT,
             'type' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'typeargs' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_TXT,
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

        );
    }
    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public $fb_fieldsToRender = array('val');
    public $fb_fieldLabels = array('val'=>'Valeur');
    public $fb_enumFields = array('type');
    public $fb_enumOptions = array('type'=>array(
      'enum'=>'Liste',
      'rich'=>'HTML',
      'international'=>'International',
      'number'=>'nombre',
      'bool'=>'Case à cocher',
      'string'=>'Chaine (une ligne)',
      'text'=>'Texte (plusieurs lignes)'
      ));
    function preGenerateForm(&$fb) {
      $this->fb_fieldLabels = array('val'=>array('','help'=>$this->description));
      switch($this->type) {
        case 'enum':
          $this->fb_enumFields = array('val');
          $this->fb_enumOptions['val'] = array_combine(explode(',',$this->typeargs),explode(',',$this->typeargs));
          break;
          case 'rich':
          $this->my_wikiFields=array('val');
          break;
          case 'international';
          $this->internationalFields=array('val');
          $this->_loadPlugins();
          break;
          case 'number':
          $this->fb_preDefElements['val'] = & HTML_QuickForm::createElement('text',$this->fb_elementNamePrefix.'val',$this->fb_fieldLabels['val'],array('size="15"'));
          break;
          case 'bool':
          $this->fb_preDefElements['val'] = & HTML_QuickForm::createElement('checkbox',$this->fb_elementNamePrefix.'val',$this->fb_fieldLabels['val']['help']);
          break;          
          case 'string':
          $this->fb_preDefElements['val'] = & HTML_QuickForm::createElement('text',$this->fb_elementNamePrefix.'val',$this->fb_fieldLabels['val'],array('size="50"'));
          break;
        default: 
          $this->fb_fieldAttributes['val'] = array('rows="5" cols="50"');
          break;
      }
      return parent::preGenerateForm($fb);
    }
    public function preProcessForm(&$values,$fb)
    {
      if(!$values['val'] && $this->type=='bool') {
        $values['val']=0;
      }
      parent::preProcessForm($values,$fb);
    }
    
    function find($autoFetch=false,$final=false) {
      if($final) {
        if(parent::find()) {
          if($autoFetch) {
            return $this->fetch();
          }
        }
      }
      $clone=clone($this);
      if(parent::find()) {
        if($autoFetch) {
          $this->fetch();
        }
                    
        return true;
        
      }
    }
    function fetch() {
        if(parent::fetch()) {
            switch($this->type) {
              case 'international':
                  $this->internationalFields=array('val');
                  $this->loadPlugin('international');
              		if(T::getLang()!=Config::get('defaultLang')){		
              			$this->getPlugin('international')->getTranslations($this);
              		}
              break;
              default:
              $this->internationalFields=null;
              break;

            }
            return true;
        }
        return false;
    }
    function insert()
    {
      $result = parent::insert();
      Config::savePrefFile();
      return $result;
    }
    function update()
    {
      $result = parent::update();
      Config::savePrefFile();
      return $result;
    }

}
