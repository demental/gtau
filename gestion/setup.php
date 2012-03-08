<?php

class M_Setup {
  public function setUpEnv()
  {
    $options = & PEAR :: getStaticProperty('DB_DataObject', 'options');
    $options = array (  'database' => DB_URI, 
                        'schema_location' => APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'DOclasses', 
                        'class_location' => APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'DOclasses', 
                        'require_prefix' => 'DataObjects/', 
                        'class_prefix' => 'DataObjects_', 
                        'debug' => key_exists('debug',$_GET)?1:0,
                        'extends' =>'DB_DataObject_Pluggable',
                        'extends_location'=>'M/DB/DataObject/Pluggable.php',
                        'db_driver'=>'MDB2',
                        'quote_identifiers'=>true,
                        'generator_no_ini'=>true,
                    );
    require_once ("MDB2.php");
    $db_options = & PEAR::getStaticProperty('MDB2','options');
    $db_options['portability']=MDB2_PORTABILITY_ALL ^ MDB2_PORTABILITY_FIX_CASE;
    $pdfopt = &PEAR::getStaticProperty('MPdf', 'global');
    $pdfopt['template_dir'] = APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'_shared'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'_pdf/';

  }
}
