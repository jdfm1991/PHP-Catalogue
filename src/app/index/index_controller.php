<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("index_model.php");

//INSTANCIAMOS EL MODELO
$index = new Index();

$numbtn   = (isset($_POST['numbtn'])) ? $_POST['numbtn'] : '1';
$search   = (isset($_POST['search'])) ? $_POST['search'] : '';

//Datos de Login
$login = (isset($_POST['login'])) ? $_POST['login'] : '';
$pass = (isset($_POST['passw'])) ? $_POST['passw'] : '';
$passw = md5($pass);

switch($_GET["op"]){

  case 'title':
    
    $data = $index->titleload();
    echo json_encode($data); 
    break;

  case 'productloading':

    $page = $numbtn;
    $countxview =  20;
    $start = ($page - 1) * $countxview;
    $condition = is_null($search) ? '' : " AND Descrip LIKE '%$search%'";

    $data = $index->productloading($condition,$start,$countxview);

    $countdata = count($data['count']);
    $tpage = ceil($countdata/$countxview);

    $dato = Array();


    if (!empty($data['data'])) {

        foreach ($data['data'] as $row) {

            $sub_array = array();

            $sub_array['Descrip']   = $row['Descrip'];
            $sub_array['reference'] = $row['reference'];
            $sub_array['imagep']    = $row['imagep'];

            $dato[] = $sub_array;
        
        }
        $dato['count'] = $tpage;
        $dato['page']  = $numbtn;

    }

    echo json_encode($dato);   
    break;

  case 'login':

    $session = $index->login($login,$passw);
    if (is_array($session) AND count($session) > 0) {

        $dato = array();
        
        foreach ($session as $usuario) {

            $_SESSION['userid'] = $usuario['userid'];
            $_SESSION['login']  = $usuario['login'];
            $_SESSION['pass']   = $usuario['pass'];
            $_SESSION['status'] = $usuario['status'];
            $_SESSION['type']   = $usuario['type'];
        }

        $dato['status']  = true;
        $dato['message'] = 'ok';
        $dato['data']    = $session;

    }else {
        $dato = array();
        
        $dato['status']  = false;
        $dato['message'] = 'El Usuario y/o password es incorrecto o no tienes permiso!';
        $dato['data']    = array();
    }
    
    
    echo json_encode($dato);
    break;
 


  
    

}





