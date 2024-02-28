<?php
require_once("../../../connection/connection.php");

class Download extends Conectar{
    

    public function subselector(){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT * FROM subsidiary";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function substamps($subselector){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT CodSucu, substamp.CodInst, stamp.Descrip FROM substamp 
                    INNER JOIN stamp ON substamp.CodInst = stamp.CodInst 
                WHERE CodSucu = '$subselector' ORDER BY stamp.Descrip ASC ";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getstamps($subselector,$stamps){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT s.CodInst, Descrip, OrdInst FROM stamp AS s
            INNER JOIN substamp AS sst ON sst.CodInst = s.CodInst
            WHERE sst.CodSucu='$subselector' AND s.CodInst IN ($stamps)
            ORDER BY OrdInst ASC;";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function searchcontent($consulta){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="$consulta";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

}
