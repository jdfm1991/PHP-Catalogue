<?php
session_name('N3wKt@10go');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../../connection/connection.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("commodity_model.php");

//INSTANCIAMOS EL MODELO
$commodity = new Commodity();


switch($_GET["op"]){

  case 'enlist':

    $subselector = (isset($_POST['subselector'])) ? $_POST['subselector'] : 'All';
    $checkimage  = (isset($_POST['checkimage'])) ? $_POST['checkimage'] : 'false';

    if ($subselector == 'All') {
      $condition = '';
    }else {
      $condition = "WHERE sb.CodSucu = '$subselector'";
    }

    if ($checkimage == 'false') {
      $condition2 = '';
    } else {
      $condition2 = " AND imagep IS NULL";
    }
    
    $data = $commodity->getDataGeneral($condition,$condition2);

    echo json_encode($data, JSON_UNESCAPED_UNICODE); 
    break;

  case 'stampselector':

    $sucubrand   = (isset($_POST['sucubrand'])) ? $_POST['sucubrand'] : 'All';
    if ($sucubrand == 'All') {
      $condition = '';
    }else {
      $condition = "WHERE Descrip = '$sucubrand'";
    }

    $data = $commodity->getSubsidiary($condition);
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
      $idCommodity      = (isset($_POST['idCommodity'])) ? $_POST['idCommodity'] : '';
      $descripCommodity = (isset($_POST['descripCommodity'])) ? $_POST['descripCommodity'] : '';

      $destino = "../../assets/img/gallery/"; 
      //Parámetros optimización, resolución máxima permitida
      $max_ancho = 300;
      $max_alto  = 300;

      $medidasimagen= getimagesize($_FILES['image']['tmp_name']);

      if($medidasimagen[0] < 500 && $_FILES['image']['size'] < 10000){
         
        $nombre_img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $destino.'/'.$nombre_img);
      }else {
        $nombre_img = $_FILES['image']['name'];

        //Redimensionar
        $rtOriginal=$_FILES['image']['tmp_name'];

        if($_FILES['image']['type']=='image/jpeg'){
            $original = imagecreatefromjpeg($rtOriginal);
        }else if($_FILES['image']['type']=='image/png'){
            $original = imagecreatefrompng($rtOriginal);
        }else if($_FILES['image']['type']=='image/gif'){
            $original = imagecreatefromgif($rtOriginal);
        }

        list($ancho,$alto)=getimagesize($rtOriginal);

        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;

        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
            $ancho_final = $ancho;
            $alto_final = $alto;
        }
        elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        }
        else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }

        $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        
        //imagedestroy($original);
        
        $cal=8;

        if($_FILES['image']['type']=='image/jpeg'){
            imagejpeg($lienzo,$destino."/".$nombre_img);
        }else if($_FILES['image']['type']=='image/png'){
            imagepng($lienzo,$destino."/".$nombre_img);
        }
        else if($_FILES['image']['type']=='image/gif'){
        imagegif($lienzo,$destino."/".$nombre_img);
        }
      }

      $data = $commodity->updateDataGeneral($idCommodity,$nombre_img);
     
    
      echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
      break;
    
    case 'delete':
      $idCommodity      = (isset($_POST['idCommodity'])) ? $_POST['idCommodity'] : '';
      $descripCommodity = (isset($_POST['descripCommodity'])) ? $_POST['descripCommodity'] : '';
     
      $data = $commodity->deleteDataGeneral($idCommodity);

    

      //$data = $stamp->deleteDataGeneral($idbrand,$sucubrand,$placebrand);
      

      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      break;

  


  
    

}





