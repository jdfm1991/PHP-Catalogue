<?php
session_name('N3wKt@10go');
session_start();
date_default_timezone_set('America/Caracas');

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("connection/connection.php");
require_once("src/app/download/pdf_model.php");
require_once("src/assets/pdf/autoload.php");

$download = new Download();

$executiontimeinit = microtime(true);
set_time_limit(600);

$subselector = $_GET['subselector'];
$stamps  = $_GET['stamps'];
$price   = $_GET['price'];
$existe  = $_GET['existe'];
$auditor = $_SESSION['userid'];

$query = '';

if ($stamps!='All') {
    $brands = $download->getstamps($subselector,$stamps);
    $nb = count($brands);
    for ($i=0; $i < $nb; $i++) {

        if ($i==0) {

            if ($price == 1) {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }elseif ($price == 2) {
                $query .='SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice2 AS pprice, bprice2 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }elseif ($price == 3) {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice3 AS pprice, bprice3 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }else {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }

            $query .= '
            INNER JOIN subsidiary AS ssd ON ssd.CodSucu = sc.CodSucu
            INNER JOIN commodity AS c ON c.CodProd = sc.CodProd
            WHERE sc.CodSucu = '.$subselector.' AND sc.CodInst = '.$brands[$i]["CodInst"].' AND c.imagep IS NOT NULL';

            if ($existe == 'false') {
                $query .= '';
            } else {
                $query .= " AND available = 'Si' ";
            }

        }else {

            $query .=' UNION ';
            if ($price == 1) {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }elseif ($price == 2) {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice2 AS pprice, bprice2 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }elseif ($price == 3) {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice3 AS pprice, bprice3 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }else {
                $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
            }

            $query .= '
            INNER JOIN subsidiary AS ssd ON ssd.CodSucu = sc.CodSucu
            INNER JOIN commodity AS c ON c.CodProd = sc.CodProd
            WHERE sc.CodSucu = '.$subselector.' AND sc.CodInst = '.$brands[$i]["CodInst"].' AND c.imagep IS NOT NULL';
            
            if ($existe == 'false') {
                $query .= '';
            } else {
                $query .= " AND available = 'Si' ";
            }

        }
        
    }
    $executiontimefinish = microtime(true);

    $duration = $executiontimefinish - $executiontimeinit;

    $hours = (int)($duration/60/60);
    $minutes = (int)($duration/60)-$hours*60;
    $seconds = (int)$duration-$hours*60*60-$minutes*60; 

    $today = date("Y/m/d h:i:s");
    $time = $hours.':'.$minutes.':'.$seconds;
    
    
} else {

    if ($price == 1) {
        $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
    }elseif ($price == 2) {
        $query .='SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice2 AS pprice, bprice2 AS bprice, available, c.imagep FROM subcommodity AS sc';
    }elseif ($price == 3) {
        $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice3 AS pprice, bprice3 AS bprice, available, c.imagep FROM subcommodity AS sc';
    }else {
        $query .= 'SELECT ssd.Descrip AS sede, c.Descrip AS producto, sc.CodInst AS insta, c.reference, pprice1 AS pprice, bprice1 AS bprice, available, c.imagep FROM subcommodity AS sc';
    }

    $query .= '
    INNER JOIN subsidiary AS ssd ON ssd.CodSucu = sc.CodSucu
    INNER JOIN commodity AS c ON c.CodProd = sc.CodProd
    WHERE sc.CodSucu = '.$subselector.' AND c.imagep IS NOT NULL';

    if ($existe == 'false') {
        $query .= '';
    } else {
        $query .= " AND available = 'Si' ";
    }

    $query .= ' ORDER BY sc.CodInst,producto ASC';

    $executiontimefinish = microtime(true);

    $duration = $executiontimefinish - $executiontimeinit;

    $hours = (int)($duration/60/60);
    $minutes = (int)($duration/60)-$hours*60;
    $seconds = (int)$duration-$hours*60*60-$minutes*60; 

    $today = date("Y/m/d h:i:s");
    $time = $hours.':'.$minutes.':'.$seconds;
    
}



$data = $download->searchcontent($query);

$name = $download->subsidiaryname($subselector);
$stylesheet = file_get_contents('src/assets/css/style.css');

if ($subselector=='00000') {
    $logo = 'confisur';
}elseif ($subselector=='00001') {
    $logo = 'confimania';
}elseif ($subselector=='00002') {
    $logo = 'cdbolivar';
}elseif ($subselector=='00003') {
    $logo = 'barcelona';
}

switch ($_GET['op']) {
    case 'catalogue':

        $body = "";
        foreach ($data as $row) {
            $body .='
        <div class="box">
            <center>
                <img src="src/assets/img/gallery/'.$row['imagep'].'" class="img">
            </center>
            <div class="text">
                <h4>'.$row['producto'].'</h4>
                <p>'.$row['reference'].'</p>';
                $data1 = $download->getstamps($subselector,$row['CodInst']);
                foreach ($data1 as $row1) {

                    $body .= '<span>'.$row1['Descrip'].'</span><br>';

                }
                
                $body .= '<strong><span>Precio Paq.: '.$row['pprice'].' $ Precio Bul.: '.$row['bprice'].' $</span></strong>
            </div>
        </div>';
        }

        $issue = 'Descarga de Catalogo';

        $audi = $download->activityauditor($auditor,$subselector,$issue,$today,$time);

        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'orientation' => 'L',
            'setAutoTopMargin' => 'stretch',
            'setAutoBottomMargin' => 'stretch',
        ]);

        $mpdf->SetHeader('<img src="src/assets/img/company/'.$logo.'.png" style="width: 100px;">|<h1>'.$name.'</h1>Pag.: {PAGENO}, Consulta del: {DATE j-m-Y}');
        $mpdf->SetFooter('&copy; Copyright <strong><span>Catalogo Digital</span></strong>. All Rights Reserved <strong><br> Diseño por </strong><b> Innovación Tecnológica <strong><span>(INTEC)</span></strong>, C.A. </b>|Precio: '.$price.',  Numero de Pagina: {PAGENO}| Fecha de Consulta: {DATE j-m-Y}');
        $mpdf->defaultheaderfontsize=10;
        $mpdf->defaultheaderfontstyle='B';
        $mpdf->defaultheaderline=0;
        $mpdf->defaultfooterfontsize=10;
        $mpdf->defaultfooterfontstyle='BI';
        $mpdf->defaultfooterline=0;

        $mpdf->SetWatermarkImage('src/assets/img/company/'.$logo.'.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->watermarkImageAlpha = 0.1;

        $mpdf->SetWatermarkText($name);
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;

        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output('Catlogo '.$name.' Precio '.$price.'.pdf',\Mpdf\Output\Destination::INLINE);
        break;
    
    case 'list':

        $body = "";
        $body.='
        <table style="text-align:center;">
            <thead>
                <tr>
                    <th style="border: black 5px solid;">Producto</th>
                    <th>Referencia</th>
                    <th>Marca</th>
                    <th>Precio Paq $</th>
                    <th>Precio Bul $</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($data as $row) {
                $body.='   
                <tr>
                    <td>'.$row['producto'].'</td>
                    <td>'.$row['reference'].'</td>';
                    $data1 = $download->getstamps($subselector,$row['CodInst']);
                    foreach ($data1 as $row1) {

                        $body.=' <td>'.$row1['Descrip'].'</td>';

                    }
                $body.='
                    <td>'.$row['pprice'].'</td>
                    <td>'.$row['bprice'].'</td>
                    <td><img src="src/assets/img/gallery/'.$row['imagep'].'" style="width: 100px;"<></td>
                </tr>';
            }
            $body.='
            </tbody>
        </table>';

        $issue = 'Descarga de Lista de Precio';

        $audi = $download->activityauditor($auditor,$subselector,$issue,$today,$time);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'orientation' => 'P',
            'setAutoTopMargin' => 'stretch',
            'setAutoBottomMargin' => 'stretch',
        ]);

        $mpdf->SetHeader('<img src="src/assets/img/company/'.$logo.'.png" style="width: 100px;">|<h1>'.$name.'</h1>Pag.: {PAGENO}, Consulta del: {DATE j-m-Y}');
        $mpdf->SetFooter('&copy; Copyright <strong><span>Catalogo Digital</span></strong>. All Rights Reserved <strong>, Diseño por </strong><b> Innovación Tecnológica <strong><span>(INTEC)</span></strong>, C.A. </b>|Precio: '.$price.',  Numero de Pagina: {PAGENO}| Fecha de Consulta: {DATE j-m-Y}');
        $mpdf->defaultheaderfontsize=10;
        $mpdf->defaultheaderfontstyle='B';
        $mpdf->defaultheaderline=0;
        $mpdf->defaultfooterfontsize=10;
        $mpdf->defaultfooterfontstyle='BI';
        $mpdf->defaultfooterline=0;

        $mpdf->SetWatermarkImage('src/assets/img/company/'.$logo.'.png');
        $mpdf->showWatermarkImage = true;
        $mpdf->watermarkImageAlpha = 0.1;

        $mpdf->SetWatermarkText($name);
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;

        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output('Lista '.$name.' Precio '.$price.'.pdf',\Mpdf\Output\Destination::INLINE);
        break;
}
