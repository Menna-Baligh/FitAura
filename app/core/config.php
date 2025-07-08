<?php
if($_SERVER['SERVER_NAME'] === 'localhost'){
    /** DB Config **/
    define('DBName','my_db');
    define('DBHost','localhost');
    define('DBUser','root');
    define('DBPass','');
    define('DBDriver','mysql');
    define('DBPort',3307);

    define('ROOT','http://localhost/MVCFramework/public');
}else{
    /** DB Config **/
    define('DBName','my_db');
    define('DBHost','localhost');
    define('DBUser','root');
    define('DBPass','');
    define('DBDriver','mysql');

    define('ROOT','https://yourwebsite.com');
}
define('APPNAME', 'my website');
define('APPDESC', 'best website on the planet');
define('DEBUG', true);

