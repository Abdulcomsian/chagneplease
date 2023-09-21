<?php
namespace App\Http\Repository;
use App\Models\Goal;

class Goals{
    
    public function add_goal($request)
    {
        $planId = $request->planId;
        $goals = $request->goals;

        Goal::where('plan_id' ,$planId)->delete();

        $planGoals = [];
        foreach($goals as $goal){
            $planGoals[] = ['plan_id' => $planId , 'title' => $goal];
        }

        Goal::insert($planGoals);
        return response()->json(['success' => true , 'msg' => 'Goals Added Successfully' ]);
    }
}