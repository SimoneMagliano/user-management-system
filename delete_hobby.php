<?php
use maglianosimone\usm\model\UserModel;
require "./__autoload.php";
session_start();
if($_SESSION['isLoged']==false){
    header('location: ./login_user.php');
}
$userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
if($userId){
    $user = new UserModel();
    $deleteSuccess = $user->delete($userId);   
    header("location: ./list_users.php");
}else{
    $invalidUserId = false;
}
?>