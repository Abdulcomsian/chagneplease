<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\Team;

class TeamController extends Controller
{
    protected $rules = ['planId' => 'required|integer'];
    
    protected $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function get_team(Request $request)
    {
        return $this->team->get_team_plan_detail($request);

    }

    public function add_team(Request $request)
    {
        $request->validate($this->rules);

        return $this->team->add_team_plan($request);

    }

    public function add_team_rating(Request $request)
    {
        return $this->team->team_rating($request);
    }


}
