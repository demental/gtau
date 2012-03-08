<?php
/**
 * Root commun à tous les éléments de l'application (chemin sur le serveur)
 **/
define ('APP_ROOT',realpath(dirname(__FILE__)).'/');

/**
 * Inclusion du fichier de config correspondant à l'host actuel
 **/
if(!isset($host)) {
  $host = $_SERVER['HTTP_HOST'];
}
include APP_ROOT.'/config.'.$host.'.php';

/**
 * Include_paths à ajouter
 **/ 
 $paths[]=APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'_shared'.DIRECTORY_SEPARATOR;
 $paths[]=APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR;
 $paths[]=APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR;

if(is_array($paths)) {
  ini_set('include_path', './:'.implode(':',$paths));
}

/**
 * Modes de fonctionnement
 **/
require 'PEAR.php';
require 'M/M_autoload.php';

T::setConfig(array('path'=>APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR.'lang/','encoding'=>Config::get('encoding'),'saveresult'=>false,'cacheDir'=>APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR.'cache/'));
$lang=$_REQUEST['lang']?$_REQUEST['lang']:'fr';
T::setLang($lang);


switch(MODE) {
	case 'developpement' :
		ini_set('error_reporting',E_ALL ^ E_NOTICE);
		ini_set('display_errors',1);
    $caching=false;
		break;
	case 'test' :		
		ini_set('error_reporting',E_ALL ^ E_NOTICE);
		ini_set('display_errors',1);
    $caching=false;
		break;
	case 'production' :
		ini_set('error_reporting',E_ALL ^ E_NOTICE);
		ini_set('display_errors',0);
    $caching=true;
		break;
}
$opt = &PEAR::getStaticProperty('Module', 'global');
$opt['template_dir'] = array(APP_ROOT.DIRECTORY_SEPARATOR.PROJECT_NAME.DIRECTORY_SEPARATOR.'_shared'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR,APP_ROOT.DIRECTORY_SEPARATOR.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR);
$opt['caching'] = $caching;
$opt['cacheDir'] = APP_ROOT.DIRECTORY_SEPARATOR.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;
$opt['cacheTime'] = 7200;
$dispatchopt = &PEAR::getStaticProperty('Dispatcher', 'global');
$dispatchopt['all']['loginmodule']='user';
$dispatchopt['all']['loginaction']='login';
$dispatchopt['all']['modulepath']=array('modules');

include APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'config.php';
include APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.APP_NAME.DIRECTORY_SEPARATOR.'config.php';
include APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'setup.php';
$setup = new M_setup();

Mreg::set('setup',$setup);