<?php

namespace App\Http\Controllers;

use App\Traits\API\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponse;
    use ValidatesRequests;
    use AuthorizesRequests;
}
