<?php 

namespace App\Http;
use App\Models\Plan;

class Helper{

    public static function plan($id)
    {
        $plan = Plan::with('marketAiQuestion', 'teamAiQuestion', 'tractionAiQuestion', 'competitionAiQuestion', 'businessAiQuestion', 'corporateAiQuestion', 'financialAiQuestion', 'intellectualAiQuestion', 'fundAiQuestion', 'investmentAiQuestion')
                    ->where('id' , $id)
                    ->first();
        return $plan;
    }

}