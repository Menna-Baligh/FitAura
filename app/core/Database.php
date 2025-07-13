<?php
trait Database{
    private $transactionConnection = null;
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
    // ✅ Start a transaction
    public function beginTransaction() {
        $this->transactionConnection = $this->connect();
        $this->transactionConnection->beginTransaction();
    }

    // ✅ Commit the transaction
    public function commit() {
        if ($this->transactionConnection) {
            $this->transactionConnection->commit();
            $this->transactionConnection = null;
        }
    }

        // ✅ Roll back the transaction
        public function rollBack() {
            if ($this->transactionConnection) {
                $this->transactionConnection->rollBack();
                $this->transactionConnection = null;
            }
        }
}