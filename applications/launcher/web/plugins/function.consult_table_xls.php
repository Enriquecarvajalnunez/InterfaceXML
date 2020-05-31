<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


function smarty_function_consult_table_xls($params)
{
    $spreadsheet = new Spreadsheet();
    

    //dirname(__FILE__).'/../../../lib'

    extract($params);
    
    $gateway = Application::getDataGateway("$table_name");    
    //$gateway->insertInforERP_First();
    //$gateway->insertInforERP_Second();
    //$gateway->Test();
    //$Insert1 = call_user_func(array($gateway,"insertInforERP_First"));
    //$Insert2 = call_user_func(array($gateway,"insertInforERP_Second"));
    //$v = call_user_func(array($gateway,"getAll$table_name"));
    $v = call_user_func(array($gateway,"UnMedida"));
    
    print_r($v);
    $html='';
    $arraykeys = array();

    if (is_array($v))
    {  
      $arraykeys = array_keys($v[0]);
      //print_r($arraykeys);
      for ($i=0;$i<count($v);$i++)//iteración para las filas del arreglo
      {
        
          for ($j=0;$j<count($arraykeys);$j++)//iteración para columnas del arreglo
          {        
              $html.= .$arraykeys[$j].$v[$i][$arraykeys[$j]];
              
          }         

      }
    }   
    else
    {
      $html.="<NODATAFOUND>NULL</NODATAFOUND>";

    }   
    
    $report_output = 'C:\xampp\htdocs\LoadDataBDXML\applications\launcher\report\generados\Importaciones.xls';
    file_put_contents($report_output,$html);
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('salida.xls');

    echo "PROCESO FINALIZADO CON EXITO !!";
}//Fin function  

?>