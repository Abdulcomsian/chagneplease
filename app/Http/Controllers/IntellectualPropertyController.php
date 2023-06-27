<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\IntellectualProperty;

class IntellectualPropertyController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $intellectualProperty;

    public function __construct(IntellectualProperty $intellectualProperty)
    {
        $this->intellectualProperty  = $intellectualProperty;
    }

    public function get_intellectual_property(Request $request)
    {
        return $this->intellectualProperty->get_intellectual_property_plan_detail($request);
    }
    
    public function add_intellectual_property(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->intellectualProperty->add_intellectual_property_plan($request);
    }

    public function add_intellectual_property_rating(Request $request)
    {
       
        return $this->intellectualProperty->intellectual_property_rating($request);
    }
}
