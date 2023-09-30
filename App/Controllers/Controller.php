<?php

namespace App\Controllers;
use App\Helper\MainHelper;

abstract class Controller {
    public $Helper;

    public function __construct() {
        $this->Helper = new MainHelper();
    }

}