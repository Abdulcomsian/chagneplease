<?php
namespace App\Http\Repository;
use App\Models\BusinessModel as BusinessPlan;
use App\Models\{Feedback , Plan};

class BusinessModel{
    
    public function add_business_model_plan($request)
    {
        try{
            BusinessPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'specific_channels' =>    $request->specificChannels ,
                'marketing_channels' =>    $request->marketingChannels ,
                'plan_b' =>    $request->planB ,
                'profit_margin' =>    $request->profitMargin ,
                'scalling_impact' =>    $request->scallingImpact ,
                'pivots' =>    $request->pivots ,
                'replaceable' =>    $request->customerStory ,
                'customer_story' =>    $request->replaceable ,
                'unique_feature' =>    $request->uniqueFeature ,
                'revenue_stream' =>    $request->revenueStream 
            ]);
            return response()->json(["success" => true , "msg" =>"Business Model Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Adding Business Model Plan " ]);
        }
    }

    public function get_business_model_plan_detail($request)
    {
        $planId = $request->id;

        $businessModelDetail = Plan::with('businessAnswer.question','businessAiQuestion.feedbacks')->where('id' , $planId)->first();

        return view('analyst.questions.business_model')->with(["planId" => $planId , "businessDetail" => $businessModelDetail]);

    }

    public function business_model_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = BusinessPlan::updateOrCreate(
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