<?php

//maglianosimone\usm\entity\user;
//src/entity/user.php

use maglianosimone\usm\entity\User as EntityUser;
use src\entity\User;

spl_autoload_register(function($className){
    $classPath = str_replace("\\",DIRECTORY_SEPARATOR,$className);
    $classPath = str_replace("\\",DIRECTORY_SEPARATOR,$classPath).".php";
    require $classPath;
    echo $classPath;
    die();

}


);
new EntityUser('a','b','c','d',"e");
?>