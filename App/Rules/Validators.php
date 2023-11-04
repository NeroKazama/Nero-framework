<?php

namespace App\Rules;

class Validators
{

    private $error = true;
    private $error_message = "";

    public function email(string $validators): array
    {

        if (!filter_var($validators, FILTER_VALIDATE_EMAIL)) {
            $this->error = false;
            $this->error_message = "Invalid email format";
        }

        return [$this->error, $this->error_message];

    }

    public function string(string $validators): array
    {

        if (!is_string($validators)) {
            $this->error = false;
            $this->error_message = "Invalid string format";
        }

        return [$this->error, $this->error_message];
    }

    public function int(string $validators): array
    {
        if (!is_int($validators)) {
            $this->error = false;
            $this->error_message = "Invalid int format";
        }

        return [$this->error, $this->error_message];

    }

    public function phone(string $validators): array
    {

        if (!filter_var($validators, FILTER_SANITIZE_NUMBER_INT)) {
            $this->error = false;
            $this->error_message = "Invalid phone format";
        }

        return [$this->error, $this->error_message];
    }

    public function max(int $validators, string $max): array
    {

        $max = intval($max);

        if(is_int($validators)) {
            if ($validators > $max) {
                $this->error = false;
                $this->error_message = "Your Value must be smaller than $max";
            }
        } else {
            $this->error = false;
            $this->error_message = "Yor value must be an integer"; 
        }

        return [$this->error, $this->error_message];
    }

    public function min(int $validators, string $min): array
    {

        $max = intval($min);

        if(is_int($validators)) {
            if ($validators < $min) {
                $this->error = false;
                $this->error_message = "Your Value must be smaller than $min";
            }
        } else {
            $this->error = false;
            $this->error_message = "Yor value must be an integer"; 
        }

        return [$this->error, $this->error_message];
    }

    public function confirmPassword(string $validators, string $password): array
    {

        if ($validators !== $password) {
            $this->error = false;
            $this->error_message = "Your password and confirm password is not equal";
        }

        return [$this->error, $this->error_message];
    }



}