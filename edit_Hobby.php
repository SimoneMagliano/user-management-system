<?php
use maglianosimone\usm\model\HobbyModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;

require "./__autoload.php";
session_start();
$action = './edit_Hobby.php';
$submit = 'salva';
$model = new HobbyModel();
if($_SERVER['REQUEST_METHOD']==='GET')
{
    $hobbyId = filter_input(INPUT_GET,'hobbyId',FILTER_SANITIZE_NUMBER_INT);
    $hobby = $model->readOne($hobbyId);
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getDefault($hobby->getName());
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $hobbyId = filter_input(INPUT_POST,'hobbyId',FILTER_SANITIZE_NUMBER_INT);
    $hobby = new HobbyModel($_POST['name']);
    $hobby->setHobbyId($hobbyId);
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getValidationClass($hobbyValidation);
    if ($val->getIsValid()) {
        $model->update($hobby);
    }
}
include 'src/view/add_user_view.php';
?>