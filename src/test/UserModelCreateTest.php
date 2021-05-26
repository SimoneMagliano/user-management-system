<?php
require __DIR__.".\src\entity\User.php"; 
require __DIR__.".\src\model\UserModel.php";
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\entity\User;
$model = new UserModel();
$user = new User('Vincenzo','Lanca','vl@email.com','1800-04-04','');
$model->create($user);

?>