<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helper\RequestHelper;
use App\Rules\Validation;

class AuthController extends Controller {

    use RequestHelper;

    public function show() {
        $this->Helper->View('auth/login.php');
    }

    public function login() {
        
        $email = $this->post('loginName');
        $password = $this->post('loginPassword');

        $validator = new Validation([
            $email => ['email']
        ]);

        if(count($validator->getErrors()) > 0) {
            $this->Helper->View('auth/login.php', ['errors' => $validator->getErrors(), 'layout' => true]);
            exit;
        }

        // $this->auth->login($email, $password);
    }

    // public function register(Request $request) {

    //     $name = $request->name;
    //     $username = $request->username;
    //     $email = $request->email;
    //     $password = $request->password;
    //     $repeatPassword = $request->repeatPassword;
    //     $agrement = $request->agrement;

    //     $this->auth->login($name, $username, $email, $password, $repeatPassword, $agrement);
    // }
}