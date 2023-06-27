<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Traction;

class TractionController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $traction;

    public function __construct(Traction $traction)
    {
        $this->traction  = $traction;
    }

    public function get_traction(Request $request)
    {
        return $this->traction->get_traction_plan_detail($request); 
    }

    public function add_traction(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->traction->add_traction_plan($request);
    }

    public function add_traction_rating(Request $request)
    {
        return $this->traction->traction_rating($request);
    }
}
