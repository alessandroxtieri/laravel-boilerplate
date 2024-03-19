<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CustomerController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
