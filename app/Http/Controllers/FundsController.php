<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Funds;

class FundsController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];
    
    protected $funds;

    public function __construct(Funds $funds)
    {
        $this->funds = $funds;
    }

    public function get_funds(Request $request)
    {
        return $this->funds->get_funds_plan_detail($request);
    }

    public function add_funds(Request $request)
    {
        return $this->funds->add_funds_plan($request);
    }

    public function add_funds_rating(Request $request)
    {
        return $this->funds->funds_rating($request);
    }
}
