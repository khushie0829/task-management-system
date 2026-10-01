<?php

namespace App\Controllers;

use App\core\Classes\Flash;
use App\core\Classes\Sanitizer;

class BaseController
{

    protected $sanitizedPost = null;
    protected $sanitizedGet = null;

    function __construct()
    {
        $cleanInputs = Sanitizer::sanitizeAllSuperglobals();
        $this->sanitizedPost = $cleanInputs['_POST'];
        $this->sanitizedGet = $cleanInputs['_GET'];
        Flash::getData();
    }
}
