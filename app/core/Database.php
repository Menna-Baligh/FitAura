<?php
trait Database{
    private function connect(){
        $dsn = DBDriver.":host=".DBHost.";port=".DBPort.";dbname=".DBName;
        $conn = new PDO($dsn , DBUser , DBPass);
        return $conn ;
    }
    public function Query($query , $data = []){
        $conn = $this->connect();
        $stm = $conn->prepare($query);
        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result ;
            }
        }
        return false ; 
    }
}
