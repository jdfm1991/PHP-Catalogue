<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("download_model.php");

//INSTANCIAMOS EL MODELO
$download = new Download();

$subselector = (isset($_POST['subselector'])) ? $_POST['subselector'] : '';


switch ($_GET["op"]) {
    case 'subselector':

        $data = $download->subselector();
        echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        break;

    case 'substamps':

        $data = $download->substamps($subselector);
        echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        break;

    case 'searchcontent':

        $subselector = (isset($_GET['subselector'])) ? $_GET['subselector'] : 'All';
        $stamps = (isset($_GET['stamps'])) ? $_GET['stamps'] : 'All';
        $price  = (isset($_GET['price'])) ? $_GET['price'] : '';
        $existe = (isset($_GET['existe'])) ? $_GET['existe'] : 'false';

        $consulta = '';

        if ($price == 1) {
            $consulta = 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
        }elseif ($price == 2) {
            $consulta = 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, c.reference, pprice2 AS pprice, bprice2 AS bprice, available, c.imagep FROM subcommodity AS sc';
        }elseif ($price == 3) {
            $consulta = 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, c.reference, pprice3 AS pprice, bprice3 AS bprice, available, c.imagep FROM subcommodity AS sc';
        }else {
            $consulta = 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
        }
        
        $consulta .= '
        INNER JOIN subsidiary AS ssd ON ssd.CodSucu = sc.CodSucu
        INNER JOIN commodity AS c ON c.CodProd = sc.CodProd
        WHERE sc.CodSucu = '.$subselector.'';

        if ($existe == 'false') {
            $consulta .= '';
          } else {
            $consulta .= " AND available = 'Si' ";
          }

        if ($stamps!='All') {
            $brands = $download->getstamps($subselector,$stamps);
            foreach ($brands as $row) {
                $cod = $row['CodInst'];
                $brand = $row['Descrip'];
                $brand = $row['OrdInst'];

                $consulta .= " AND sc.CodInst IN ($stamps)";
            }
            $consulta .= ' ORDER BY c.Descrip ASC';
            $data = $download->searchcontent($consulta);
        }else {
            $data = $download->searchcontent($consulta);
        }
                
        echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        break;
    
}