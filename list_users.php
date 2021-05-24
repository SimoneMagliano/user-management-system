<?php
require "./__autoload.php";
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\service\UserSession;

(new UserSession())->redirect();

$model = new UserModel();
include './src/view/list_users_view.php';
?>
