<?php
require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\service\UserSession;

(new UserSession())->redirect();

$model = new UserModel();
include './src/view/list_users_view.php';
?>
