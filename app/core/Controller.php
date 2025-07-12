<?php
trait Controller{
    public function view($fileName  , $data=[]){
        $fileName = "../app/views/".$fileName.".views.php";
        if(file_exists($fileName)){
            extract($data);
            require $fileName ;
        }else{
            $fileName = "../app/views/404.views.php";
            require $fileName; 
        }
    }
}