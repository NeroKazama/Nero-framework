<?php

namespace App\Controllers;

use App\Controllers\Controller;

class BaseController extends Controller {

    public function show() {
        $this->Helper->View('home.php');
    }
}