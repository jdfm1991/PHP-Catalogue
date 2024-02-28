<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("audit_model.php");

//INSTANCIAMOS EL MODELO
$audi = new Audi();

$subselector   = (isset($_POST['subselector'])) ? $_POST['subselector'] : '';

switch($_GET["op"]){

  case 'linksubsidiary':
    
    $data = $audi->linksubsidiary($subselector);
    echo json_encode($data); 
    break;

  case 'enlist':

    $data = $audi->getDataGeneral();
    echo json_encode($data); 
    break;
    

}

