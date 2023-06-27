<?php
namespace App\Http\Repository;
use App\Models\Financial as FinancialPlan;
use App\Models\Feedback;

class Financial{
    
    public function add_financial_plan($request)
    {
        try{
            FinancialPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'product_marketing' =>    $request->productMarketing ,
                'marketing_budget' =>    $request->marketingBudget ,
                'acquisition_cost' =>    $request->acquisitionCost ,
                'lifetime_value' =>    $request->lifetimeValue ,
                'equity_debt' =>    $request->equityDebt ,
                'fundraising' =>    $request->fundraising ,
                'burn_rate' =>    $request->burnRate ,
                'time_period' =>    $request->timePeriod ,
                'metrics_key' =>    $request->metricsKey ,
                'stock_options' =>    $request->stockOptions 
            ] );
            return response()->json(["success" => true , "msg" =>"Financial Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Financial Plan" ]);
        }
    }

    public function get_financial_plan_detail($request)
    {
        $planId = $request->id;

        $financialDetail = FinancialPlan::where("plan_id" , $planId)->first();

        return view('analyst.questions.financial')->with(["planId" => $planId , "financialDetail" => $financialDetail]);
    }

    public function financial_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = FinancialPlan::updateOrCreate(
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