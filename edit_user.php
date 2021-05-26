<?php 
use maglianosimone\usm\factory\UserFactory;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;
use maglianosimone\usm\validator\UserValidation;
require "./__autoload.php";
$action = './edit_user.php';
$submit = 'sava';

if($_SERVER['REQUEST_METHOD']==='GET'){

    $userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $userModel = new UserModel();
    $user = $userModel->readOne($userId);
   
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault($user->getFirstName());
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault($user->getLastName());
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault($user->getEmail());
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault($user->getBirthday());      
}
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $userId = filter_input(INPUT_POST,'userId',FILTER_SANITIZE_NUMBER_INT);
    $user = UserFactory::fromArray($_POST);
    $user->setUserId($userId);
    print_r($user);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
   
    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    $user->setBirthday($birthday);
    if ($val->getIsValid()) {
        $userModel = new UserModel();
        $userModel->update($user);
        header('location: ./list_users.php');
    }
}
include 'src/view/add_user_view.php';
?>
