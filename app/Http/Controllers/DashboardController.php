<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Plan , User};

class DashboardController extends Controller
{
    // public function __construct()
    // {

    // }

    public function get_admin_dashboard()
    {
        $totalPlans = Plan::count();
        $totalUsers = User::count();
        $totalInvestment = number_format(Plan::get()->sum('amount') , 2);
        $requiredInvestment = number_format(Plan::get()->sum('investment') , 2);
        return view('admin.dashboard')->with(['totalPlans' => $totalPlans , 'totalUsers' => $totalUsers , 'totalInvestment' => $totalInvestment , 'requiredInvestment' => $requiredInvestment]);
    }

    public function get_analyst_dashboard()
    {
        $newUser = User::where('status' , '=' , 'approved')->count();
        $totalUser = User::count();
        $plan = Plan::where('status' ,'=' , 'accepted')->count();
        $totalPlan  = Plan::count();
        return view('analyst.dashboard')->with(["newUser" => $newUser , "totalUser" => $totalUser , "newPlan" => $plan , "totalPlan" => $totalPlan]);
    }



}
