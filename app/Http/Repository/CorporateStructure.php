<?php
namespace App\Http\Repository;
use App\Models\CorporateStructure as CorporateStructurePlan;
use App\Models\{Feedback , Plan};

class CorporateStructure{
    
    public function add_corporate_structure_plan($request)
    {
        try{
            CorporateStructurePlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'organized_company' =>    $request->organizedCompany ,
                'hold_titles' =>    $request->holdTitles ,
                'split_shares' =>    $request->splitShares ,
                'existing_board' =>    $request->existingBoard ,
                'registered_company' =>    $request->registeredCompany ,
                'account_handling' =>    $request->accountHandling ,
                'talent_skills' =>    $request->talentSkills ,
                'selected_founder' =>    $request->selectedFounder ,
                'employee_selector' =>    $request->employeeSelector ,
                'registered_agent' =>    $request->registeredAgent 
            ]);
            return response()->json(["success" => true , "msg" =>"Corporate Structure Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Corporate Structure Plan" ]);
        }
    }

    public function get_corporate_structure_plan_detail($request)
    {
        $planId = $request->id;

        $corporateStructureDetail = Plan::with('corporateAnswer.question' , 'corporateAiQuestion')->where("id" , $planId)->first();

        return view('analyst.questions.corporate_structure')->with(["planId" => $planId, "corporateDetail" => $corporateStructureDetail]);
    }

    public function corporate_structure_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = CorporateStructurePlan::updateOrCreate(
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