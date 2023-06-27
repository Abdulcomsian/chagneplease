<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\BusinessModel;

class BusinessModelController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];
    
    protected $businessModel;

    public function __construct(BusinessModel $businessModel)
    {
        $this->businessModel = $businessModel;
    }

    public function get_business_model(Request $request)
    {
        return $this->businessModel->get_business_model_plan_detail($request);
    }

    public function add_business_model(Request $request)
    {
        $request->validate($this->rules);

        return $this->businessModel->add_business_model_plan($request);

    }

    public function add_business_model_rating(Request $request)
    {
        return $this->businessModel->business_model_rating($request);
    }
}
