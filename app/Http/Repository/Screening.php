<?php

namespace App\Http\Repository;
use App\Models\{ ScreeningAnswer };

class Screening{

    public function add_screening_answer($request)
    {
        ScreeningAnswer::where('plan_id', $request->planId)->delete();

        $screeningAnswerList = [];
        $planId = $request->planId;
        $screeningAnswers = $request->screeningAnswers;
        foreach($screeningAnswers as $answer)
        {
            $screeningAnswerList[] = [ "plan_id" => $planId , "screening_id" => $answer['question'] , "answer" => $answer['value'] ];
        }

        ScreeningAnswer::insert($screeningAnswerList);

        return response()->json(["success" => true , "msg" => "Screening Question Adding Successfully"]);

    }

}