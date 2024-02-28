<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("stamp_model.php");

//INSTANCIAMOS EL MODELO
$stamp = new Stamp();


switch($_GET["op"]){

  case 'enlist':

    $subselector   = (isset($_POST['subselector'])) ? $_POST['subselector'] : 'All';

    if ($subselector == 'All') {
      $condition = '';
    }else {
      $condition = "WHERE sub.CodSucu = '$subselector'";
    }
    $data = $stamp->getDataGeneral($condition);

    echo json_encode($data, JSON_UNESCAPED_UNICODE); 
    break;

  case 'stampselector':

    $sucubrand   = (isset($_POST['sucubrand'])) ? $_POST['sucubrand'] : 'All';
    if ($sucubrand == 'All') {
      $condition = '';
    }else {
      $condition = "WHERE Descrip = '$sucubrand'";
    }

    $data = $stamp->getSubsidiary($condition);
    $dato = Array();

    foreach ($data as $row) {

      $sub_array = array();
  
      $sub_array['CodSucu'] = $row['CodSucu'];
      $sub_array['Descrip'] = $row['Descrip'];

      $dato[] = $sub_array;

    }

    echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
    break;

    case 'save_update':
      $idbrand      = (isset($_POST['idbrand'])) ? $_POST['idbrand'] : '';
      $descripbrand = (isset($_POST['descripbrand'])) ? $_POST['descripbrand'] : '';
      $sucubrand    = (isset($_POST['sucubrand'])) ? $_POST['sucubrand'] : '';
      $placebrand   = (isset($_POST['placebrand'])) ? $_POST['placebrand'] : '';

      $condition = "WHERE s.CodInst = '$idbrand' AND sub.CodSucu = '$sucubrand' ";
      
      $consult = $stamp->getDataGeneral($condition);

      $count = count($consult);
      $dato = Array();

      if ($count == 0) {
        
        $sub_array = array();
        $sub_array['operation'] =  'new';
        $dato[] = $sub_array;

      } else {

        $data = $stamp->updateDataGeneral($idbrand,$sucubrand,$placebrand);

        $sub_array = array();
        $sub_array['operation']    = 'update';
        $sub_array['descripbrand'] = $descripbrand;
        $dato[] = $sub_array;

      }
    
      echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
      break;
    
    case 'delete':
      $idbrand      = (isset($_POST['idbrand'])) ? $_POST['idbrand'] : '';
      $sucubrand    = (isset($_POST['sucubrand'])) ? $_POST['sucubrand'] : '';
      $placebrand   = (isset($_POST['placebrand'])) ? $_POST['placebrand'] : '';

      if (!empty($sucubrand) && isset($sucubrand)) {
        $condition = "WHERE Descrip = '$sucubrand'";        
      }

      $sucu = $stamp->getSubsidiary($condition);

      foreach ($sucu as $row) {
        $codsucu = $row['CodSucu'];
      }
      $data = $stamp->deleteDataGeneral($idbrand,$codsucu,$placebrand);

    

      //$data = $stamp->deleteDataGeneral($idbrand,$sucubrand,$placebrand);
      

      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      break;

  


  
    

}





