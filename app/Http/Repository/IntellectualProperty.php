<?php
namespace App\Http\Repository;
use App\Models\IntellectualProperty as IntellectualPropertyPlan;
use App\Models\Feedback;

class IntellectualProperty{
    
    public function add_intellectual_property_plan($request)
    {
        try{
            IntellectualPropertyPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'unique_company' =>    $request->uniqueCompany ,
                'problem_solve' =>    $request->problemSolve ,
                'legal_risk' =>    $request->legalRisk ,
                'product_liability' =>    $request->productLiability ,
                'regulatory_risk' =>    $request->regulatoryRisk ,
                'intellectual_property' =>    $request->intellectualProperty ,
                'developed_intellectual_property' =>    $request->developedIntellectualProperty ,
                'person_left' =>    $request->personLeft ,
                'additional_partner' =>    $request->additionalPartner ,
                'current_intellectual_assets' =>    $request->currentIntellectualAssets 
            ]);
            return response()->json(["success" => true , "msg" =>"Intellectual Property Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Intellectual Property Plan" ]);
        }
    }

    public function get_intellectual_property_plan_detail($request)
    {
        $planId = $request->id;

        $intellectualPropertyDetail = IntellectualPropertyPlan::where("plan_id" , $planId)->first();

        return view('analyst.questions.intellectual_property')->with(["planId" => $planId , "intellectualPropertyDetail" => $intellectualPropertyDetail]);

    }

    public function intellectual_property_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = IntellectualPropertyPlan::updateOrCreate(
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