<?php
namespace App\Http\Repository;
use App\Models\Traction as TractionPlan;
use App\Models\{ Feedback , Plan};

class Traction{
    
    public function add_traction_plan($request)
    {

        try{
            TractionPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                 "plan_id" => $request->planId,
                 "feedback" => $request->feedback,
                 "changes" => $request->changes,
                 "actual_user" => $request->actualUser,
                 "average_stay" => $request->averageStay,
                 "actual_sales" => $request->actualSales,
                 "annual_growth" => $request->annualGrowth,
                 "growth_rate" => $request->growthRate,
                 "growth_linear_consistent" =>$request->growthLinearConsistent,
                 "held_back" =>$request->heldBack,
                 "demonstration" =>$request->demonstration,
            ]);
    
            return response()->json(["success" => true , "msg" =>"Traction Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Traction Plan" ]);
        }
    }

    public function get_traction_plan_detail($request)
    {
        $planId = $request->id;

        $tractionDetail = Plan::with( 'goals' , 'tractionAnswer.question' , 'tractionAiQuestion.feedbacks' , 'tractionAiQuestion.aiReport' )->where('id' , $planId)->first();

        return view('analyst.questions.traction')->with(['planId' => $planId , 'tractionDetail' => $tractionDetail]);
    }

    public function traction_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = TractionPlan::updateOrCreate(
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
