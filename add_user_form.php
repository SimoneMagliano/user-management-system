<?php 
use maglianosimone\usm\factory\UserFactory;
use maglianosimone\usm\model\HobbyModel;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;
use maglianosimone\usm\validator\UserValidation;

require "./__autoload.php";
$action = './add_user_form.php';
$submit = 'aggiungi nuovo utente';
$stmt = $db->prepare("...");
$stmt->execute();
$id = $db->lastInsertId();
if($_SERVER['REQUEST_METHOD']==='GET'){
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault();
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault();
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault();    
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault();    
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();    
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $user = UserFactory::fromArray($_POST);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
    $passwordValidation = $val->getError('password');

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);    
    $user->setBirthday($birthday);
    if ($val->getIsValid()) {
        try {
            $userModel = new UserModel();
            $userModel->create($user);
            header('location: ./list_users.php');
        } catch (\Throwable $th) {
            $msg = "{$th->getCode()} - Esiste già un utente con questa email: <strong>$email</strong>";
        }
    }
}
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
if($_SESSION['isLoged']==false){
    header('location: ./login_user.php');
}
include 'src/view/add_user_view.php';
?>
