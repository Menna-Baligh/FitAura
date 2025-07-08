<?php
trait Controller{
    public function view($fileName){
        $fileName = "../app/views/".$fileName.".views.php";
        if(file_exists($fileName)){
            require $fileName ;
        }else{
            $fileName = "../app/views/404.views.php";
            require $fileName; 
        }
    }
}