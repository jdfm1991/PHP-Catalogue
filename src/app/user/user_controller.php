<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("user_model.php");

//INSTANCIAMOS EL MODELO
$user = new User();


switch($_GET["op"]){

  case 'enlist':
    
    $data = $user->getDataGeneral();

    echo json_encode($data, JSON_UNESCAPED_UNICODE); 
    break;

    case 'save_update':
      
      $idUser   = (isset($_POST['idUser'])) ? $_POST['idUser'] : '';
      $nickname = (isset($_POST['nickname'])) ? $_POST['nickname'] : '';
      $type     = (isset($_POST['type'])) ? $_POST['type'] : '';

      $data = $user->updateDataGeneral($idUser,$type);
     
    
      echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
      break;
    
    case 'delete':
      $iduser      = (isset($_POST['iduser'])) ? $_POST['iduser'] : '';
      $descripuser = (isset($_POST['descripuser'])) ? $_POST['descripuser'] : '';
     
      $data = $user->deleteDataGeneral($iduser);

    

      //$data = $stamp->deleteDataGeneral($idbrand,$sucubrand,$placebrand);
      

      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      break;

  


  
    

}





