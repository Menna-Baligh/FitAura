<?php
class App{
    private $controller = 'Home' ;
    private $method = 'index' ;
    private function splitUrl(){
        
            // Get the full request URI (e.g., /public/cart/checkout)
            $request = $_SERVER['REQUEST_URI'] ?? '/';

            // Get the script name (e.g., /public/index.php)
            $script = $_SERVER['SCRIPT_NAME'];

            // Get the base path (e.g., /public)
            $base = dirname($script);

            // Remove the base path from the request URI
            $path = str_replace($base, '', $request);

            // Remove any query string from the URL (e.g., ?id=3)
            $path = parse_url($path, PHP_URL_PATH);

            // Trim slashes and split the URL into parts
            $URL = explode('/', trim($path, '/'));

            // If URL is empty, fallback to 'home'
            if (empty($URL[0])) {
                $URL[0] = 'home';
            }

            return $URL;
        }

    
    
    public function loadController(){
        $URL = $this->splitUrl();
        $fileName = "../app/controllers/".ucfirst($URL[0]).".php" ;
        if(file_exists($fileName)){
            require $fileName ;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        }else{
            $fileName = "../app/controllers/_404.php" ;
            require $fileName ;
            $this->controller = "_404" ;
        }
        $controller = new $this->controller ;
        if(!empty($URL[1])){
            if(method_exists($controller ,$URL[1])){
                $this->method = $URL[1] ;
                unset($URL[1]);
            }
        }
        call_user_func_array([$controller , $this->method],$URL);
    }

}