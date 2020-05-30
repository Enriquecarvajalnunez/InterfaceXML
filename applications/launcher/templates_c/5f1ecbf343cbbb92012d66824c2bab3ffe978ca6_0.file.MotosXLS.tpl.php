<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-30 06:21:21
  from 'C:\xampp\htdocs\LoadDataBDXML\applications\launcher\web\html\MotosXLS.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed1df4128b399_91410751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f1ecbf343cbbb92012d66824c2bab3ffe978ca6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LoadDataBDXML\\applications\\launcher\\web\\html\\MotosXLS.tpl',
      1 => 1590812478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed1df4128b399_91410751 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\LoadDataBDXML\\applications\\launcher\\web\\plugins\\function.consult_table_xls.php','function'=>'smarty_function_consult_table_xls',),));
?>
<!-- 
* Se realiza llamado a plugin consult_table_XML y se envian parametros que 
* debe recibir el plugin para poder procesar la data
* Autor : @Enrique Nuñez
-->

<?php echo smarty_function_consult_table_xls(array('table_name'=>"InfoERP",'ruta'=>"xmls",'file_name'=>"vw_cebes_erp.xml",'itemName'=>"importaciones"),$_smarty_tpl);
}
}
