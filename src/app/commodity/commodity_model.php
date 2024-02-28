<?php
require_once("../../../connection/connection.php");

class Commodity extends Conectar{

    public function getDataGeneral($condition,$condition2){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT sc.CodSucu AS codsu, sb.Descrip AS sucu, sc.CodProd AS codp, c.Descrip AS producto, sc.CodInst AS codi, s.Descrip AS marca, reference, available, imagep 
                    FROM subcommodity AS sc 
                    INNER JOIN subsidiary AS sb ON sb.CodSucu=sc.CodSucu 
                    INNER JOIN commodity AS c ON c.CodProd=sc.CodProd 
                    INNER JOIN stamp AS s ON s.CodInst=sc.CodInst $condition $condition2";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getSubsidiary($condition){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT * FROM subsidiary $condition";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function updateDataGeneral($idCommodity,$nombre_img){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="UPDATE commodity SET imagep = '$nombre_img' WHERE CodProd  = '$idCommodity'";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function deleteDataGeneral($idCommodity){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY

            $sql0="DELETE FROM subcommodity WHERE CodProd = '$idCommodity'";    
            $sql="DELETE FROM commodity WHERE CodProd = '$idCommodity'";

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.

        $sql0 = $conectar->prepare($sql0);
        $sql0->execute();

        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }
    

    
    

}

