<?php
trait Model {
    use Database ;
    protected $limit      = 10 ;
    protected $offset     = 0 ;
    protected $order_type = 'desc' ;
    protected $order_col  = 'id' ;
    public $errors        = [];

    public function selectAll(){
        $query = "SELECT * FROM $this->table ORDER BY $this->order_col $this->order_type";
        return $this->Query($query);
    }
    public function where($data , $dataNot = []){
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        $query = "SELECT * FROM $this->table WHERE ";
        // select * from table where id = :id && name != :name
        foreach($keys as $key){
            $query.= $key." = :".$key." && " ;
        }
        foreach($keysNot as $key){
            $query.= $key." != :".$key." && " ;
        }
        $query = trim($query , " && ");
        $query .= " ORDER BY $this->order_col $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data , $dataNot);
        $result = $this->Query($query , $data);
        if($result) return $result ;
        return false ; 
    }
    public function first($data , $dataNot = []){
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        $query = "SELECT * FROM $this->table WHERE ";
        // select * from table where id = :id && name != :name
        foreach($keys as $key){
            $query.= $key." = :".$key." && " ;
        }
        foreach($keysNot as $key){
            $query.= $key." != :".$key." && " ;
        }
        $query = trim($query , " && ");
        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data , $dataNot);
        $result = $this->Query($query , $data);
        if($result) return $result[0];
        return false ; 
    }
    public function insert($data){

        if(!empty($this->allowedColumns)){
            foreach(array_keys($data) as $key){
                if(!in_array($key , $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        // insert into table(name , age) values(:name , :age) ;
        $query = "INSERT INTO $this->table(".implode(',',$keys).") VALUES (:".implode(',:',$keys).")";
        $this->query($query, $data);
        return false;
    }
    public function update($id , $data , $idColumn = 'id'){
        if(!empty($this->allowedColumns)){
            foreach(array_keys($data) as $key){
                if(!in_array($key , $this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        // update table set name=:name , age=:age where $idColumn = :$idColumn
        $query = "UPDATE $this->table SET ";
        foreach($keys as $key){
            $query .= $key." = :".$key." , ";
        }
        $query = trim($query , " , ");
        $query.= " WHERE $idColumn = :$idColumn" ;
        $data[$idColumn] = $id ;
        $this->Query($query,$data);
        return false ;
    }
    public function delete($id , $idColumn = 'id'){
        // delete from table where id = :id
        $data[$idColumn] = $id ;
        $query = "DELETE FROM $this->table WHERE $idColumn = :$idColumn" ;
        $this->Query($query , $data);
        return false ;
    }
}