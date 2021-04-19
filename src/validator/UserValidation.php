<?php

class UserValidation {
    private $user;
    private $errors = [];
    private $isValid = true;

    public $firstNameResult;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function validate()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $result = $this->validateFirstName();
        $this->errors['firstName'] = $result;

        if(!$result->isValid){
             $this->isValid = false;   
        }


    }

    private function validateFirstName():?ValidationResult
    {
        $firstName = trim($this->user->getFirstName());
        if(empty($firstName)){
            $validationResult = new ValidationResult('Il nome è obbligatorio',false,$firstName);
        } else {
            $validationResult = new ValidationResult('Il nome è corretto',true,$firstName);
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