<?php
if($_SERVER['SERVER_NAME'] === 'localhost'){
    /** DB Config **/
    define('DBName','fitaura'); //note: name of the database you created
    define('DBHost','localhost');
    define('DBUser','root');
    define('DBPass','');
    define('DBDriver','mysql');
    define('DBPort',3307); //note: change this is to 3306 if you are using the defualt port

    define('ROOT','http://localhost:8080/public');
}else{
    /** DB Config **/
    define('DBName','fitaura');
    define('DBHost','localhost');
    define('DBUser','root');
    define('DBPass','');
    define('DBDriver','mysql');

    define('ROOT','https://yourwebsite.com');
}
define('APPNAME', 'my website');
define('APPDESC', 'best website on the planet');
define('DEBUG', true);

