<?php

namespace App\Rules;

use App\Rules\Validators;

class Validation {

    private $validators;
    private $errors = [];
    private $data = [];

    public function __construct(array $fieldValidators)
    {
        foreach ($fieldValidators as $field => $validators) {
            $this->addValidator($field, $validators);
        }
        
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getData(): array
    {
        return $this->data;
    }

    private function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }

    private function addValidator(string $field, array $validators): void
    {
        $handler = new Validators();
        $variable = null;

        foreach($validators as $item) {

            $method = $item;
            if(str_contains($item, 'max') || str_contains($item, 'min') || str_contains($item, 'confirmPassword')){
                $string = explode("|", $item);
                $method = $string[0];
                $variable = $string[1];
            }
            
            $callback = [$handler, $method];
            $resp = call_user_func_array($callback, [$field, $variable]);
            
            if($resp[0] == false) {
                $this->addError( $item, $resp[1]);
            }
        }
    }

}