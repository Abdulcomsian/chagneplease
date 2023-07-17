<?php
namespace App\Http\Repository;
use App\Models\Team as TeamPlan;
use App\Models\{ Feedback , Plan};
class Team{
    
    public function add_team_plan($request)
    {
        try{
            TeamPlan::updateOrCreate(
                ["plan_id" => $request->planId ],
                [
                'plan_id' => $request->planId,
                'headquarter' =>    $request->headquarter ,
                'founders' =>    $request->founders ,
                'team_members' =>    $request->teamMembers ,
                'board_members' =>    $request->boardMembers ,
                'roles' =>    $request->roles ,
                'experience' =>    $request->experience ,
                'right_person' =>    $request->rightPerson ,
                'motivation' =>    $request->motivation ,
                'founder' =>    $request->founder ,
                'responsible_idea' =>    $request->responsibleIdea ,
                
            ]);
            return response()->json(["success" => true , "msg" =>"Team Plan Added Successfully" ]);
        }
        catch(Exception $e)
        {
            return response()->json(["success" => false , "msg" =>"Error While Uploading Team Plan" ]);
        }
    }

    public function get_team_plan_detail($request)
    {   
        $planId = $request->id;

        $teamDetail = Plan::with('teamAnswer.question' , 'teamAiQuestion.feedbacks' , 'teamAiQuestion.aiReport')->where("id" , $planId)->first();

        return view('analyst.questions.team')->with(['planId' => $planId , 'teamDetail' => $teamDetail]);
    }


    public function team_rating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            // $planableId = $request->planabaleId;
            $planableType = $request->planableType;
            $planId = $request->planId;
            $userId = auth()->user()->id;
    
    
            $planableId = TeamPlan::updateOrCreate(
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