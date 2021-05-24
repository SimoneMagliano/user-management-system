<?php
use sarassoroberto\usm\model\UserModel;
include "./__autoload.php";

$userModel = new UserModel();
$users = $userModel->readAll();

print_r($users);