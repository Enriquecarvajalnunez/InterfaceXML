<html>
<head>
       <title>Save Configuration File</title>
</head>
<body>
<h2>Save Default Configuration File</h2>
<hr>
<?php

/**
 * Generado por Spyro LitlePhp FrameWork
 * @author LitlePhp FrameWork
 * @copyright Spyro Solutions
 */

//Esto es para independizar librerias del include_path de PHP
//Se afecta el Application.class y el Serializer.php
global $saveconfiguration;
$saveconfiguration="S";

require_once "config.inc.php";
require_once "Serializer.class.php";

$Application_config = array (
    'name' => 'Launcher',
    'description' => 'Launcher Demo Web Applications Write with LitlePHP',
    'version' => '0.3',
    'app_id' => 'LDWA',
// languaje 
    'language' => 'es',
// application mode (development = 0 | production = 1) 
    'mode' => '1',
// authentication system (enabled | disabled )
    "auth" => 'disabled', 
// application autentica (yes = 0 | no = 1) 
	'authentication' => '1', 
	
// application log Managment LOG (sql=>Data Base, file=> File Log , Nothing => Not Log)
    'log' => 'file',
// application log file, only if File Log
    'logfile' => 'c:/tmp/authlogfile.log',

// application log table file , only if  Data Base
// this tables exist in same schema Data Bussines Logi
    'logtable' => 'authlogtable',
    
// application errorlog Managment LOG (file=> File ErrorLog , Nothing => Not ErrorLog)
    'errorlog' => 'file',
// application log file only if  File ErrorLog
    'errorlogfile' => 'c:/tmp/autherrorlogfile.log',

// application log table file
// this tables exist in same schema Data Bussines Logi
    'errorlogtable' => 'authlogtable',

/**
 *
 * CREATE TABLE authlogtable (
 *  id          INT NOT NULL,
 *  logtime     TIMESTAMP NOT NULL,
 *  ident       CHAR(16) NOT NULL,
 *  priority    INT NOT NULL,
 *  message     VARCHAR(200),
 *  PRIMARY KEY (id)
 * );
*/


// URL del sitio dominio ó localhost
   'url' =>'http://www.dominio.com',
// application template for look and feel
    'template' => 'default',

// character encoding
    'charset' => 'utf-8',
// use prefix por domain and data (yes = 1 | no = 0) 
    'useprefix' => '1',
// application splash (yes = 0 | no = 1) 
    'splash' => '1',
    
// character encoding
    'charset' => 'utf-8',

// Database date function
    'dbfundate' => 'TO_DATE',
// Database date format  Separator
    'dbdateformatseparator' => '-',
// Database date format
    'dbdateformat' => 'YYYY-MM-DD',
// Database use date format ( yes = 1 | no = 0)
    'dbusedateformat' => '1',
// Database Time Stamp format
    'dbdatetsformat' => 'hh:mi:ss',
// Database use Time Stamp format ( yes = 1 | no = 0 )
    'dbusedatetsformat' => '0',

// library path
    'include_path' => array (
        dirname(__FILE__).'/../.',
        dirname(__FILE__).'/../php/classes',
        dirname(__FILE__).'/../../../lib',
        dirname(__FILE__).'/../../../lib/DataType',
        dirname(__FILE__).'/../../../lib/smarty-3.1.34/libs',
        dirname(__FILE__).'/../../../lib/PEAR',
        dirname(__FILE__).'/../../../lib/PEAR/MDB2-2.5.0', 
        dirname(__FILE__).'/../../../lib/PEAR/MDB_MetaData',
        dirname(__FILE__).'/../../../lib/adodb5.20.17',
        dirname(__FILE__).'/../../../lib/swiftmailer/lib',    
		dirname(__FILE__).'/../../../lib/tcpdf', 
        dirname(__FILE__).'/../../../lib/captcha',
        dirname(__FILE__).'/../../../lib/vendor',
        dirname(__FILE__).'/../../../lib/vendor/composer',
        dirname(__FILE__).'/../../../lib/vendor/markbaker',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/complex',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/complex/examples',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/complex/classes',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/complex/classes/src/functions',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/complex/classes/src/operations',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix/classes',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix/classes/src',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix/classes/src/functions',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix/classes/src/operations',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/matrix/classes/src/Operators',
        dirname(__FILE__).'/../../../lib/vendor/markbaker/examples',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docs',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docs/assets',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docs/extra',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docs/references',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docstopics',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/bin/docstopics/images',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Autofilter',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Basic',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Basic/data',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Basic/data/continents',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/bootstrap',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/bootstrap/css',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/bootstrap/fonts',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/bootstrap/js',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Calculations',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Calculations/Database',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Calculations/DateTime',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Chart',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/images',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Pdf',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Reader',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Reader/sampleData',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Reading_workbook_data',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/Reading_workbook_data/sampleData',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/samples/templates',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Ods',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/ ',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xls',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xls/Color',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xls/Style',
        dirname(__FILE__).'/../../../lib/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx',    
        dirname(__FILE__).'/../../../lib/vendor/psr',
        dirname(__FILE__).'/../../../lib/vendor/psr/simple-cache',
        dirname(__FILE__).'/../../../lib/vendor/psr/simple-cache/src',
        ),
		        
// directories

    'commands_dir' => '/web/commands',
    'views_dir' => '/web/views',
    'templates_dir' => '/web/html',
    'plugins_dir' => '/web/plugins',
    'icons_dir' => '/icons',
    'images_dir' => '/images',
    'domain_dir' => '/domain',
    'data_dir' => '/data',
    'report_dir' => '/report',
    'language_dir' => '/language',
    'docstemplates_dir' => '/web/docstemplates',
    'docstmp_dir' => '/web/docstmp',	


// database  type = Mysql,Oracle,Pgsql,adodb
'database' => array (
    'default' => array(
        'name' => 'TESTERP',
        'type' => 'adodb',
        'host' => 'TESTERP_NEW',
        'hostport' =>'1521',
        'user' => 'unoee_fanalca',
        'password' => 'erp$2015',
        'connection' => 'pdo_oci8'  //pdo_mysql,pdo_oci8,pdo_postgres,...        
        ),
    'bd2' => array (
        'name' => 'ERPO',
        'type' => 'adodb',
        'host' => 'ERPSCAN',
        'hostport' =>'2682',
        'user' => 'runt_fanalca',
        'password' => 'valera',
        'connection' => 'pdo_oci8'  //pdo_mysql,pdo_oci8,pdo_postgres,...            
        )
    ),            
               
);

echo "<pre>";
print_r($Application_config);
echo "</pre>";

$result = Serializer::save($Application_config, 'application.conf.data');

if (@PEAR::isError($result)) {
    echo "Error creating configuration file";
}

?>
</body>
</html>
