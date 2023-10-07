<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class AuthController extends Controller {

    public function show() {
        $this->Helper->View('auth/login.php');
    }
}