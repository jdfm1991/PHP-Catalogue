<?php
require_once("../../../connection/connection.php");

class Index extends Conectar{

    public function titleload(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT * FROM company LIMIT 1";
    
        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function productloading($condition,$start,$countxview){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

            $sql="SELECT Descrip, reference, imagep FROM commodity WHERE imagep IS NOT NULL $condition ORDER BY descrip ASC LIMIT $start,$countxview";
            $sql1="SELECT * FROM commodity WHERE imagep IS NOT NULL $condition";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        $count = $sql1->fetchAll(PDO::FETCH_ASSOC);

        return array("data"=>$result,"count"=>$count);

    }

    public function login($login,$passw){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT * FROM users WHERE login = '$login' AND pass = '$passw' ";
    
        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

}

