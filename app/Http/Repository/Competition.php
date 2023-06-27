<?php
namespace App\Http\Repository;
use App\Models\Competitions as CompetitionPlan;
use App\Models\Feedback;

class Competition{
    
    public function add_competition_plan($request)
    {
        try{
            CompetitionPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'competitors' =>    $request->competitors ,
                'advantages' =>    $request->advantages ,
                'disadvantages' =>    $request->disadvantages ,
                'barriers' =>    $request->barriers ,
                'letting_down' =>    $request->lettingDown ,
                'competitors_not_done' =>    $request->competitorsNotDone ,
                'differ_feature' =>    $request->differFeature ,
                'compare_price' =>    $request->comparePrice ,
                'compare_service' =>    $request->compareService ,
                'customer_satisfaction' =>    $request->customerSatisfaction 
            ]);
            return response()->json(["success" => true , "msg" =>"Competition Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Adding Competition Plan" ]);
        }
    }

    public function get_competition_plan_detail($request)
    {
        $planId = $request->id;
        
        $competitionDetail = CompetitionPlan::where('plan_id' , $planId)->first();

        return view('analyst.questions.competition')->with(["planId" => $planId , "competitionDetail" => $competitionDetail]);
    }

    public function competition_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = CompetitionPlan::updateOrCreate(
                ['plan_id' => (int)$planId],
                [
                    'rating' => (int)$score
                ]
            );
    
            $check = [ null , ""];
    
            if(!in_array( trim($feedback) , $check))
            {
                Feedback::create([
                    "planable_id"  => $planableId->id,
                    "planable_type" => $planableType,
                    "description" => $feedback,
                    "analyst_id"  => $userId,
                ]);
            }
    
            return response()->json(["success" => true , "msg" => "Score Added Successfully"] );
    
            }
            catch(\Exception $e)
            {
                return response()->json(["success" => true , "msg" => "Something Went Wrong" , "error" => $e->getMessage()] );
            }
    
    }
}