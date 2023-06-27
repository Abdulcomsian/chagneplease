<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Financial;

class FinancialController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $financial;

    public function __construct(Financial $financial)
    {
        $this->financial  = $financial;
    }

    public function get_financial(Request $request)
    {
        return $this->financial->get_financial_plan_detail($request);

    }

    public function add_financial(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->financial->add_financial_plan($request);
    }

    public function add_financial_rating(Request $request)
    {
        return $this->financial->financial_rating($request);
    }
}
