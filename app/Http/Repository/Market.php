<?php
namespace App\Http\Repository;
use App\Models\Market as MarketPlan;
use App\Models\{ Feedback , Plan };

class Market{
    public function add_market_plan($request)
    {
        try{
           $market =  MarketPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                 "plan_id" => $request->planId,
                 "market_opportunity" => $request->marketOpportunity,
                 "market_share" => $request->marketShare,
                 "customer" => $request->bestCustomer,
                 "time_taken" => $request->timeTaken,
                 "figures" => $request->figures,
                 "pr_strategy" => $request->prStrategy,
                 "aspire" => $request->aspire,
                 "least_like" =>$request->leastLike,
                 "right_time" =>$request->rightTime,
                 "strategy" =>$request->marketStrategy,
                 "status" => "Pending",
            ]);
            return response()->json(["success" => true , "msg" =>"Market Plan Added Successfully" ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Market Plan Added Successfully" ]);
        }
    }

    public function get_market_plan_detail($request)
    {
        $planId = $request->id;
        // $marketDetail = MarketPlan::where('plan_id' , $planId)->first();
        $marketDetail = Plan::with('marketAnswer.question' , 'marketAiQuestion.feedbacks' , 'marketAiQuestion.aiReport')->where('id' , $planId)->first();
        
        return view('analyst.questions.market')->with(['planId'=>$planId , "marketDetail" => $marketDetail]);
    }

    public function market_rating($request)
    {
        try{
        $score = $request->score;
        $feedback = $request->feedback;
        // $planableId = $request->planabaleId;
        $planableType = $request->planableType;
        $planId = $request->planId;
        $userId = auth()->user()->id;


        $planableId = MarketPlan::updateOrCreate(
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