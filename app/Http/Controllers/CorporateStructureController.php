<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\CorporateStructure;

class CorporateStructureController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $corporateStructure;

    public function __construct(CorporateStructure $corporateStructure)
    {
        $this->corporateStructure  = $corporateStructure;
    }

    public function get_corporate_structure(Request $request)
    {
        return $this->corporateStructure->get_corporate_structure_plan_detail($request);
    }
    
    public function add_corporate_structure(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->corporateStructure->add_corporate_structure_plan($request);
    }

    public function add_corporate_structure_rating(Request $request)
    {
        return $this->corporateStructure->corporate_structure_rating($request);
    }
}
