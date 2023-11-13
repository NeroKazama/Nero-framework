<?php

namespace App\Controllers\Auth;

use App\Helper\RequestHelper;
use App\Models\Auth;
use App\Rules\Validation;

class AuthController extends Auth {

    use RequestHelper;

    public function show() {
        $this->Helper->View('auth/login.php');
    }

    public function signin() {
        
        $email = $this->post('loginName');
        $password = $this->post('loginPassword');

        $validator = new Validation([
            $email => ['email']
        ]);

        if(count($validator->getErrors()) > 0) {
            $this->Helper->View('auth/login.php', ['errors' => $validator->getErrors(), 'layout' => true]);
            exit;
        }
       
        // $this->userLogin($email, $password);
    }

    public function register() {

        $name = $this->post('registerUsername');
        $email = $this->post('registerEmail');
        $password = $this->post('registerPassword');
        $repeatPassword = $this->post('registerRepeatPassword');
        $agrement = $this->post('registerCheck');

        $validator = new Validation([
            $name => ['string'],
            $email => ['email'],
            $password => ['confirmPassword|'.$repeatPassword]
        ]);

        if(count($validator->getErrors()) > 0) {
            $this->Helper->View('auth/login.php', ['errors' => $validator->getErrors(), 'layout' => true]);
            exit;
        }

        $this->create($name, $email, $password);

        $this->Helper->View('home.php');
    }
}