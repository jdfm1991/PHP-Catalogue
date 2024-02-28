<?php
require_once("../../../connection/connection.php");

class Stamp extends Conectar{

    public function getDataGeneral($condition){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="SELECT sub.CodSucu, sub.Descrip AS branch, s.Descrip AS brand, s.CodInst, OrdInst FROM substamp AS st
                    INNER JOIN subsidiary AS sub ON sub.CodSucu = st.CodSucu
                    INNER JOIN stamp AS s ON s.CodInst = st.CodInst
                    $condition ORDER BY sub.CodSucu ASC;";
    
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

    public function updateDataGeneral($idbrand,$sucubrand,$placebrand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="UPDATE substamp SET OrdInst = '$placebrand' WHERE CodInst = '$idbrand' AND CodSucu = '$sucubrand'";

            $add="UPDATE substamp SET OrdInst = OrdInst+1 WHERE CodInst != '$idbrand' AND CodSucu = '$sucubrand' AND OrdInst >= '$placebrand'";
    
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();

        $add = $conectar->prepare($add);
        $add->execute();

        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function deleteDataGeneral($idbrand,$codsucu,$placebrand){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="DELETE FROM substamp WHERE CodInst = '$idbrand' AND CodSucu = '$codsucu'";

            $add="UPDATE substamp SET OrdInst = OrdInst-1 WHERE CodInst != '$idbrand' AND CodSucu = '$codsucu' AND OrdInst >= '$placebrand'";

            $add = $conectar->prepare($add);
            $add->execute();

        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    }
    

    
    

}

