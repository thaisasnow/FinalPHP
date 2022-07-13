<?php
    require_once('Connection.php');

   

    function fnAddChocolate($nome, $foto, $description, $price) {
        $con = getConnection();
        
        
        $sql = "insert into Chocolate (nome, foto, description, price) values (:pNome, , :pFoto, :pdescription, :pprice)";
        
        $stmt = $con->prepare($sql); 
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto); 
        $stmt->bindParam(":pdescription", $description); 
        $stmt->bindParam(":pprice", $price); 
       
        return $stmt->execute();
    }

    function fnListChocolate() {
        $con = getConnection();

        $sql = "select * from Chocolate";

        $result = $con->query($sql);

        $lstChocolate = array();
        while($Chocolate = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstChocolate, $Chocolate);
        } 

        return $lstChocolate;
    }

    function fnLocalizaChocolatePorNome($nome) {
        $con = getConnection();

        $sql = "select * from Chocolate where nome like :pNome limit 20";

        $stmt = $con->prepare($sql);

        $stmt->bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnLocalizaChocolatePorId($id) {
        $con = getConnection();

        $sql = "select * from Chocolate where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }
    
    function fnUpdateChocolate($id, $nome, $foto, $description, $price) {
        $con = getConnection();
                
        $sql = "update Chocolate set nome = :pNome, foto= :pFoto, description = :pdescription, price = :pprice where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id); 
        $stmt->bindParam(":pNome", $nome); 
        $stmt->bindParam(":pFoto", $foto); 
        $stmt->bindParam(":pdescription", $description); 
        $stmt->bindParam(":pprice", $price); 
       
        
        return $stmt->execute();
    }
    
    function fnDeleteChocolate($id) {
        $con = getConnection();
                
        $sql = "delete from Chocolate where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();
        
    }