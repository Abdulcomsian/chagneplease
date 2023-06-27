<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {

    // }

    public function get_admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function get_analyst_dashboard()
    {
        return view('analyst.dashboard');
    }



}
