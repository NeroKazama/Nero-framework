<?php

namespace App\Helper;
use App\Controllers\Controller;

trait RequestHelper
{

    public function get($item)
    {
        return htmlspecialchars($_GET[$item], ENT_QUOTES, "UTF-8");
    }

    public function post($item)
    {
        return htmlspecialchars($_POST[$item], ENT_QUOTES, "UTF-8");
    }

}

?>