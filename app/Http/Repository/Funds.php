<?php
namespace App\Http\Repository;
use App\Models\Funds as FundsPlan;
use App\Models\{Feedback , Plan};
class Funds{
    
    public function add_funds_plan($request)
    {
        try{
            FundsPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'funds_allocated' =>    $request->fundsAllocated ,
                'spent' =>    $request->spent ,
                'expansion' =>    $request->expansion ,
                'not_recieved_money' =>    $request->notRecievedMoney ,
                'asset_invested' =>    $request->assetInvested ,
                'milestones' =>    $request->milestones ,
                'biggest_risks' =>    $request->biggestRisks ,
                'raising_capitals' =>    $request->raisingCapitals ,
                'fundraising_efforts' =>    $request->fundraisingEfforts ,
                'personal_expenses' =>    $request->personalExpenses 
            ]);
            return response()->json(["success" => true , "msg" =>"Funds Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Funds Plan" ]);
        }
    }

    public function get_funds_plan_detail($request)
    {
        $planId = $request->id;

        $fundsDetail = Plan::with('fundAnswer.question' , 'fundAiQuestion.feedbacks','fundAiQuestion.aiReport')->where("id" , $planId)->first();

        return view('analyst.questions.funds')->with(["planId" => $planId , "fundsDetail" => $fundsDetail]);
    }

    public function funds_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = FundsPlan::updateOrCreate(
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