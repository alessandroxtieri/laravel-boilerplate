<?php

namespace App\Http\Controllers\Customer;

use Illuminate\View\View;

class HomeController extends CustomerController
{
    /**
     * Display the customer dashboard's home page.
     *
     * @return View A view for the customer home page.
     */
    public function index(): View
    {
        return view('customer.home');
    }
}
