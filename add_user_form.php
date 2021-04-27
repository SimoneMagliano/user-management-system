<?php 
//require "autoload.php";
//require __DIR__."/vendor/testTools/testTool.php";

use maglianosimone\usm\entity\User as EntityUser;
use maglianosimone\usm\model\UserModel as ModelUserModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper as BootstrapValidationFormHelper;
use maglianosimone\usm\validator\UserValidation as ValidatorUserValidation;
use maglianosimone\usm\entity\User;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;
use maglianosimone\usm\validator\UserValidation;

require "./__autoload.php";

// require __DIR__."/src/validator/fondation/ValidationFormHelper.php"
// print_r($_POST);
if($_SERVER['REQUEST_METHOD']==='GET'){
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = BootstrapValidationFormHelper::getDefault();
    
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $user = new EntityUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday']);
    $val = new ValidatorUserValidation($user);
    $firstNameValidation = $val->getError('firstName');

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = BootstrapValidationFormHelper::getValidationClass($firstNameValidation);

    if ($val->getIsValid()) {
        //TODO
        $userModel = new ModelUserModel();
        $userModel->create($user);
       // header('location: ./list_users.php');
    }
}

include 'src/view/add_user_view.php';
?>
