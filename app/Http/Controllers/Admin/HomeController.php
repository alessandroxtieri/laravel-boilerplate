<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class HomeController extends AdminController
{
    /**
     * Display the admin dashboard's home page.
     *
     * @return View A view for the admin home page.
     */
    public function index(): View
    {
        return view('admin.home');
    }
}
