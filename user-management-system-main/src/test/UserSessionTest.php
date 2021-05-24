<pre>
<?php

use sarassoroberto\usm\service\UserSession;

// print_r(scandir('../'));


require "../../__autoload.php";
require "../../vendor/testTools/testTool.php";

$us = new UserSession();

$user = $us->autenticate('luigi.russo@email.com','Luigi');

print_r($_SESSION);

// assertEquals($_SESSION['user_autenticated'],$user); 

?>
</pre>