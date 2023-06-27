<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ExistingFinancial;

class ExistingFinancialRoundController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $existingFinancial;

    public function __construct(ExistingFinancial $existingFinancial)
    {
        $this->existingFinancial  = $existingFinancial;
    }

    public function get_existing_financial_round(Request $request)
    {
        return $this->existingFinancial->get_existing_financial_plan_detail($request);
    }

    public function add_existing_financial(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->existingFinancial->add_existing_financial_plan($request);
    }

    public function add_existing_financial_rating(Request $request)
    {
        return $this->existingFinancial->existing_financial_rating($request);
    }


}
