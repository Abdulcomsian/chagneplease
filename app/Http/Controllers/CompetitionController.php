<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Repository\Competition;

class CompetitionController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];

    protected $competition;

    public function __construct(Competition $competition)
    {
        $this->competition  = $competition;
    }

    public function get_competition(Request $request)
    {
        return $this->competition->get_competition_plan_detail($request);
    }

    public function add_competition(Request $request)
    {
        $request->validate($this->rules);
        
        return $this->competition->add_competition_plan($request);
    }

    public function add_competition_rating(Request $request)
    {
        return $this->competition->competition_rating($request);
    }
}
