<?php

use maglianosimone\usm\entity\User;
use maglianosimone\usm\model\UserModel;

require __DIR__."/../entity/User.php"; 
require __DIR__."/../model/UserModel.php";

$model = new UserModel();
$user = new User('Simone','Magliano','simone.magliano@libero.it','1985-11-19');
$model->create($user);

