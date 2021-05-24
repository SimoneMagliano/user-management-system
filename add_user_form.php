<?php 
use maglianosimone\usm\entity\User;
use maglianosimone\usm\factory\UserFactory;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\validator\bootstrap\ValidationFormHelper;
use maglianosimone\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './add_user_form.php';
$submit = 'aggiungi nuovo utente';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
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
             // TODO
            $userModel = new UserModel();
            $userModel->create($user);
            header('location: ./list_users.php');
        } catch (\Throwable $th) {
            $msg = "{$th->getCode()} - Esiste già un utente con questa email: <strong>$email</strong>";
        }
       
    }
    
}
    $stmt = $db->prepare("...");
    $stmt->execute();
    $id = $db->lastInsertId();
include 'src/view/add_user_view.php';
?>
