<?php
namespace App\Http\Repository;
use App\Models\{
    ExistingFinancial as ExistingFinancialPlan,
    Market,
    Traction,
    Team,
    Competitions,
    Financial,
    IntellectualProperty,
    BusinessModel,
    Funds,
    CorporateStructure,
    Feedback
};

class ExistingFinancial{
    
    public function add_existing_financial_plan($request)
    {
        try{
            ExistingFinancialPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'exit_goal' =>    $request->exitGoal ,
                'help_exit' =>    $request->expectedTimeFrame ,
                'follow_up_round' =>    $request->followUpRound ,
                'valuation' =>    $request->valuation ,
                'current_valuation' =>    $request->currentValuation ,
                'current_raisings' =>    $request->currentRaisings ,
                'previous_investor' =>    $request->previousInvestor ,
                'next_milestone' =>    $request->nextMilestone ,
                'investor_help' => $request->investorHelp,
                'total_customer' =>    $request->totalCustomer ,
                'operation_country' =>    $request->operationCountry ,
                'founded_date' =>    $request->foundeDate ,
                'maturity' =>    $request->maturity ,
                'full_time_employee' =>    $request->fullTimeEmployee ,
                'annual_revenue' =>    $request->annualRevenue ,
                'projected_revenue' =>    $request->projectedRevenue ,
                'net_profit' =>    $request->netProfit ,
                'cach_balance' =>    $request->cachBalance ,
                'funding_request' =>    $request->fundingRequest
            ] , ["plan_id" => $request->planId ]);

            Market::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            Traction::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            Team::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            Competitions::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            Financial::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            IntellectualProperty::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            BusinessModel::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            Funds::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);
            CorporateStructure::where('plan_id',$request->planId)->update(["status" => "investee_complete"]);


            return response()->json(["success" => true , "msg" =>"Existing Financial Round Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Existing Financial Round Plan" ]);
        }
    }

    public function get_existing_financial_plan_detail($request)
    {
        $planId = $request->id;

        $existingFinancialDetail = ExistingFinancialPlan::where('plan_id' , $planId)->first();

        return view('analyst.questions.existing_financial')->with(['planId' => $planId , 'existingFinancialDetail' => $existingFinancialDetail]);
    }

    public function existing_financial_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = ExistingFinancialPlan::updateOrCreate(
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