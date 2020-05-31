<?php

/*
*Clase de la data Gateway que permite  recuperar los datos a la base de datos y realizar los insert
*@Autor: Enrique Nuñez
*/
class InfoERP
{
    var $connection;
    var $consult;    
    
    function __construct()
    {
        $this->connection = Application::getDatabaseConnection();            
        //Permite generar arreglo asociativo
        $this->connection->SetFetchMode(2);        
    }

    function getAllInfoERP()
    {                       
        $sql = "select f353_id_sucursal
                f1_tercero_suc,
                t200_prov.f200_id  
                f1_tercero,
                t200_prov.f200_razon_social
                f1_tercero_razon_social,
                nvl(rtrim(f353_prefijo_cruce)|| '-' ,' ')  ||    lpad(nvl(f353_consec_docto_cruce,0),8,'0')  f1_docto_cruce,
                f353_fecha_docto_cruce
                f1_fecha_cruce, f353_fecha_vcto  f1_fecha_vcto,
                sum(f_saldo /1)  f1_saldo_total, sum(f_saldo_alterno /1)  
                f1_saldo_total_alt, rtrim(t350.f350_id_co) || '-' ||
                rtrim(t350.f350_id_tipo_docto) || '-' ||  lpad(t350.f350_consec_docto,8,'0')
                f1_docto_causacion, t350.f350_usuario_aprobacion  f_usuario_aprobacion,
                f353_fecha  f1_fecha_docto
            from
            unoee_fanalca.t353_co_saldo_abierto
                inner join unoee_fanalca.tp1_calcular_saldo_sa_corte on f353_rowid = f_rowid_sa
                inner join t200_mm_terceros t200_prov on f353_rowid_tercero = t200_prov.f200_rowid
                inner join t202_mm_proveedores t202_prov on t202_prov.f202_rowid_tercero = f353_rowid_tercero
                and f353_id_sucursal = t202_prov.f202_id_sucursal
                inner join t350_co_docto_contable t350 on t350.f350_rowid = f353_rowid_docto
                inner join unoee_fanalca.tp1_cons_cxp on f1_rowid_sa = f353_rowid
                where not(f_saldo /1 = 0 and f_saldo_alterno /1 = 0)
                and not ((f1_dias_vencido) > 0 and not (f1_dias_vencido between 1 and 999999))
                group by f353_id_sucursal , t200_prov.f200_id , t200_prov.f200_razon_social, nvl(rtrim(f353_prefijo_cruce)|| '-' ,' ')  ||  
                lpad(nvl(f353_consec_docto_cruce,0),8,'0') , f353_fecha_docto_cruce ,
                f353_fecha_vcto , rtrim(t350.f350_id_co) || '-' ||
                rtrim(t350.f350_id_tipo_docto) || '-' ||  lpad(t350.f350_consec_docto,8,'0')
                , t350.f350_usuario_aprobacion , f353_fecha";

        $this->consult = $this->connection->GetAll($sql);                
        return $this->consult;                                
    }

    function insertInforERP_First()
    {
        $sql = "insert  into tp1_calcular_saldo_sa_corte select  f353_rowid,        f353_total_cr -
                f353_total_db,f353_total_cr_alt - f353_total_db_alt, 0 ,0 from
                t353_co_saldo_abierto  inner join t010_mm_companias t010 on f353_id_cia =
                t010.f010_id and  t010.f010_id = 1 inner join t254_co_mayores_auxiliares
                t254 on f353_rowid_auxiliar = t254.f254_rowid_auxiliar and t254.f254_id_cia
                = f353_id_cia and t254.f254_id_plan = 'PUC' and
                substring(t254.f254_id_mayor,1,len('2205')) = '2205' inner join
                t253_co_auxiliares t253 on t253.f253_rowid = t254.f254_rowid_auxiliar and
                f253_ind_sa = 2  inner join t285_co_centro_op t285 on t285.f285_id =
                f353_id_co_cruce and t285.f285_id_cia = f353_id_cia  inner join
                t280_co_regionales t280 on t280.f280_id_cia = t285.f285_id_cia and
                t280.f280_id = t285.f285_id_regional inner join t281_co_unidades_negocio
                t281 on t281.f281_id = f353_id_un_cruce and f353_id_cia = t281.f281_id_cia
                inner join t200_mm_terceros t200_prov on t200_prov.f200_rowid =
                f353_rowid_tercero  inner join t202_mm_proveedores t202_prov on
                t202_prov.f202_rowid_tercero = f353_rowid_tercero and f353_id_sucursal =
                t202_prov.f202_id_sucursal inner join t277_co_tipo_prov t277 on
                t277.f277_id = t202_prov.f202_id_tipo_prov and t277.f277_id_cia =
                t202_prov.f202_id_cia  where f353_fecha_cancelacion is null";
        print_r('Entre first!');                  

        $this->consult = $this->connection->Execute($sql);
        return $this->consult;
    }

    function insertInforERP_Second()
    {
        $sql =   "insert into tp1_cons_cxp select f_rowid_sa,case when f353_fecha_vcto >=
                '22-MAY-20' then abs(datediff('DD','22-MAY-20', f353_fecha_vcto)) + 1 else
                case when 0 = 0 THEN 0  when 0 = 1 and f_saldo < 0 THEN datediff('DD',
                f353_fecha_docto_cruce,'22-MAY-20')  else 0 end end,case when
                f353_fecha_vcto >= '22-MAY-20' or f_saldo < 0 then 1 else 0 end,case when
                f_saldo < 0 then case when 0 = 0 THEN 0  when 0 = 2 and f_saldo < 0 THEN
                datediff('DD', f353_fecha_docto_cruce,'22-MAY-20')  else 0 end when
                f353_fecha_docto_cruce < '22-MAY-20' and 1 = 0 then datediff('DD',
                f353_fecha_docto_cruce, '22-MAY-20') when f353_fecha_vcto < '22-MAY-20' and
                1 = 1 then datediff('DD', f353_fecha_vcto, '22-MAY-20') when dateadd('DD',
                datediff('DD',f353_fecha_docto_cruce,nvl(f353_fecha_radicacion,
                f353_fecha_docto_cruce)),f353_fecha_vcto) < '22-MAY-20' and 1 = 2 then
                datediff('DD', dateadd('DD',datediff('DD',f353_fecha_docto_cruce,
                nvl(f353_fecha_radicacion,f353_fecha_docto_cruce)),f353_fecha_vcto),
                '22-MAY-20') else 0 end,case when f_saldo < 0 then 0 when f353_fecha_vcto <
                '22-MAY-20' then 1 else 0 end  FROM t353_co_saldo_abierto INNER JOIN
                tp1_calcular_saldo_sa_corte ON f353_rowid = f_rowid_sa  INNER JOIN
                t202_mm_proveedores t202_prov ON f353_rowid_tercero =
                t202_prov.f202_rowid_tercero AND f353_id_sucursal =
                t202_prov.f202_id_sucursal  LEFT JOIN t208_mm_condiciones_pago ON
                f208_id_cia = t202_prov.f202_id_cia AND f208_id =
                t202_prov.f202_id_cond_pago";
        print_r('Entre second!');                 
        $this->consult = $this->connection->Execute($sql);
        return $this->consult;
    }

    function Test()
    {
        print_r('Entre !');        
    }

    function UnMedida()
    {
        $sql = "SELECT  * from T101_MC_UNIDADES_MEDIDA";

        $this->consult = $this->connection->GetAll($sql);                
        return $this->consult;
    }
}


?>