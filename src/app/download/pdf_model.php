<?php
require_once("connection/connection.php");

class Download extends Conectar{
    

    public function searchcontent($query){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION2
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();
    
        //QUERY
    
            $sql="$query";
    
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

    public function subsidiaryname($subselector){

        $conectar= parent::conexion();
        parent::set_names();
        
         //QUERY
 
             $sql= ("SELECT Descrip FROM subsidiary WHERE CodSucu = '$subselector'");
 
         //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
         $sql = $conectar->prepare($sql);
         $sql->execute();
         
         return ($sql->fetch(PDO::FETCH_ASSOC)['Descrip']) ;
    }

    public function activityauditor($auditor,$subselector,$issue,$today,$time){
        //LLAMAMOS A LA CONEXION QUE CORRESPONDA CUANDO ES SAINT: CONEXION
        //CUANDO ES APPWEB ES CONEXION.
        $conectar= parent::conexion();
        parent::set_names();

        //QUERY

        $sql="INSERT INTO auditdata (iduser, CodSucu, issue, actdate, acttime) VALUES(?,?,?,?,?)";

		//PREPARACION DE LA CONSULTA PARA EJECUTARLA.
		$sql = $conectar->prepare($sql);
		$sql->bindValue(1, $auditor);
        $sql->bindValue(2, $subselector);
        $sql->bindValue(3, $issue);
        $sql->bindValue(4, $today);
        $sql->bindValue(5, $time);
        
        //PREPARACION DE LA CONSULTA PARA EJECUTARLA.
        
      
        return $sql->execute();
    }

}
