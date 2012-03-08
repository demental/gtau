<?php
define('IMG_FORMAT_PNG',	1);
define('IMG_FORMAT_JPEG',	2);
define('IMG_FORMAT_WBMP',	4);
define('IMG_FORMAT_GIF',	8);

$dispatchopt = &PEAR::getStaticProperty('Dispatcher', 'global');
$dispatchopt['all']['modulepath'][]='M/Office/modules/';

Mtpl::addJS('jquery');

define('SIZE_SPACING_FONT',	5);
Mreg::append('autoload', 
    array('MyAuthHelper'=>'lib/MyAuthHelper.php',
          'CRMExchange'=>'lib/CRMExchange.php',
          'FPDF'=>'lib/fpdf/fpdf.php',
          'BarCode'=>'lib/barcode/BarCode.php',
          'i25'=>'lib/barcode/i25.barcode.php',
          'FColor'=>'lib/barcode/FColor.php',
          'FDrawing'=>'lib/barcode/FDrawing.php',
          'Font'=>'lib/barcode/Font.php',
          'nusoap_client'=>'lib/nusoap.php',
          'ShippingHandler'=>'lib/shippingHandler.php'
));
Mreg::append('autoloadcallback',array('DOMPDF_autoload'));



$frontEndOptions =& PEAR::getStaticProperty('m_office', 'options');
$frontEndOptions = array(
              'regenerate'=>true,
							'root_url'=>ROOT_ADMIN_URL,
							'auth'=>false,
							'adminTitle'=>"Facturation Tau",
              'modules'=>array(
                'clients'=>array(
                  'type'=>'db',
                  'title'=>'Clients',
                  'table'=>'clients'),
                'factures'=>array(
                  'type'=>'db',
                  'title'=>'Factures',
                  'table'=>'factures'),  
                'depenses'=>array(
                  'type'=>'db',
                  'title'=>'Dépenses',
                  'table'=>'depenses'),  
                'depenses_cat'=>array(
                  'type'=>'db',
                  'title'=>'Cat dépenses',
                  'table'=>'depenses_cat'),  
                'deplacement'=>array(
                  'type'=>'db',
                  'title'=>'Déplacements',
                  'table'=>'deplacement'),  
                'preferences'=>array(
                  'type'=>'dyn',
                  'title'=>'Préférences')
                  ),
                );
                
$frontEndHomeOptions =& PEAR::getStaticProperty('m_office_frontendhome', 'options');
$frontEndHomeOptions = array('searchInTables'=>array('clients','factures'),
								'quickView'=>array(
									'factures'=>array('limit'=>20)
									)
									);
                $chooseTableOptions =& PEAR::getStaticProperty('m_office_choosetable', 'options');
                $chooseTableOptions = array('modulesToList'=>array(
                                              'clients',
                                              'factures',
                                              'depenses',
/*                                              'deplacement',                                              */
                                              array('preferences','depenses_cat')
                                              ),
                							'chooseTableTitle'=>"facturation demental.info");
$showTableOptions =& PEAR::getStaticProperty('m_office_showtable', 'options');
$showTableOptions = array(
  'tableOptions'=>array(
    'factures'=>array('recordsPerPage'=>100,
        'fields'=>array('id','client_id','date','designation','ratio_tva','montant','paye')
    ),

    )
  );             							