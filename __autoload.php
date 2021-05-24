<?php

# esempi di trasformazione da $className a classPath
// maglianosimone\usm\entity\User;
// src/entity/User.php

// maglianosimone\usm\validator\bootstrap\ValidationFormHelper;
// src/validator/bootstrap/ValidationFormHelper.php;

# prima sostituisco il mio namespace 
// 1. maglianosimone\usm --> src
// 2. \ --> DIRECTORY_SEPARATOR (\,/)

spl_autoload_register(function($className){
    $classPath = str_replace("maglianosimone\usm",__DIR__."\src",$className);
    $classPath = str_replace("\\",DIRECTORY_SEPARATOR,$classPath).".php";
    //echo $classPath."<br>";
    require_once $classPath;      
});


