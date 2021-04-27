<?php

namespace maglianosimone\usm\validator;

use maglianosimone\usm\entity\User as EntityUser;
use sarassoroberto\usm\entity\User;

class UserValidation {

    public const FIRST_NAME_ERROR_NONE_MSG = 'Il nome è ggiusto !!';
    public const FIRST_NAME_ERROR_REQUIRED_MSG = 'Il nome è obbligatorio';

    private $user;
    private $errors = [] ;// Array<ValidationResult>;
    private $isValid = true;

    public $firstNameResult;

    public function __construct(EntityUser $user) {
        $this->user = $user;
        $this->validate();
    }

    private function validate()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $this->errors['firstName']  = $this->validateFirstName();
        //$this->errors['lastName']  = $this->validateLastName();
        //$this->errors['birthday']  = $this->validateBirt();

    }

    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    private function validateFirstName():?ValidationResult
    {
        $firstName = trim($this->user->getFirstName());

        if(empty($firstName)){
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_REQUIRED_MSG,false,$firstName);
        } else {
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_NONE_MSG,true,$firstName);
        };
        return $validationResult;
    }

    /**
     *  foreach($userValidation->getErrors() as $error ){
     *   echo "<li</li>"
     *  }
     * 
     */
    public function getErrors()
    {
        return $this->errors; 
    }

    /**
     * $userValidation->getError('firstName');
     * @var ValidationResult $errorKey Chiave associativa che contiene un ValidationResult corrispondente
     */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }


}