<?php
/**
 * index.php5
 * from project_name
 * Created on 1 déc. 2005
 *
 * @author arnaud sellenet <http://demental.info>
 *  
 **/
 ini_set('memory_limit','1024M');
 define('APP_NAME','office');
define('IN_ADMIN',1);
require '../M_startup.php';

 $adminArea=1;
require 'M/Office.php';

define('ROOT_ADMIN_URL',SITE_URL);
session_start();
$_SESSION['test']=1;

Mreg::get('setup')->setUpEnv();
$frontend = new M_Office();
header('Content-type:text/html; charset=utf-8');
echo $frontend->display();
/*if(function_exists('textmate_print_error_handler')) {
  textmate_print_error_handler();
}*/