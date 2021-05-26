<?php
use maglianosimone\usm\model\HobbyModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;

require "./__autoload.php";
session_start();
$title = 'Aggiungi Interessi';
$submit = 'aggiungi nuovo interesse';
$model = new HobbyModel();
if($_SERVER['REQUEST_METHOD']==='GET'){
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getDefault();
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $hobby = new HobbyModel($_POST['name']);
    if ($val->getIsValid()) {
        $model->create($hobby);
    }
}

?>