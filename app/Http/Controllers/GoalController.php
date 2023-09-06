<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\{Goals};
class GoalController extends Controller
{
    protected $goalHandler;

    function __construct(Goals $goalHandler)
    {
        $this->goalHandler = $goalHandler;
    }
    public function get_goal_form(Request $request){
        $planId = $request->planId;
        return view('user.questions.goals')->with(['planId' => $planId]);
    }

    public function add_plan_goal(Request $request)
    {
        try{
            return $this->goalHandler->add_goal($request);
        }catch(\Exception $e){
            return response()->json(['success' => false ,  'msg' => 'Something Went Wrong' , 'error' => $e->getMessage()]);
        }
    }
}
