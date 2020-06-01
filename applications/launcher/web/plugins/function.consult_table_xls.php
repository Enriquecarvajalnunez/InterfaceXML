<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


function smarty_function_consult_table_xls($params)
{
    $spreadsheet = new Spreadsheet();
        

    extract($params);
    
    $gateway = Application::getDataGateway("$table_name");    
    //$gateway->insertInforERP_First();
    //$gateway->insertInforERP_Second();
    //$gateway->Test();
    //$Insert1 = call_user_func(array($gateway,"insertInforERP_First"));
    //$Insert2 = call_user_func(array($gateway,"insertInforERP_Second"));
    //$v = call_user_func(array($gateway,"getAll$table_name"));
    $v = call_user_func(array($gateway,"UnMedida"));
    
    //print_r($v);
    $html='';
    $arraykeys = array();

    if (is_array($v))
    {  
      $arraykeys = array_keys($v[0]);
      //print_r($arraykeys);

      $Row = 2;
      for ($i=0;$i<count($v);$i++)//itera filas del arreglo
      {
          $Column = 1;
          //$Row = 2;
          print_r($Row);
          for ($j=0;$j<count($arraykeys);$j++)//itera columnas del arreglo
          {               
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($Column,1,$arraykeys[$j]);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($Column,$Row,$v[$i][$arraykeys[$j]]);

            $Column++;
            //$Row++;                                             
            //$html.= $arraykeys[$j];          
          }$Row++;                                                      

      }
    }   
    else
    {
      $html.="<NODATAFOUND>NULL</NODATAFOUND>";

    }   
    
    //$report_output = 'C:\xampp\htdocs\LoadDataBDXML\applications\launcher\report\generados\Importaciones.xls';
    //file_put_contents($report_output,$html);
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('salida.xls');

    echo "PROCESO FINALIZADO CON EXITO !!";
}//Fin function  

?>