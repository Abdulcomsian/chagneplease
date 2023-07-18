<?php

namespace App\Http\Repository;
use App\Models\Plan;

class Home{
    
    public function get_home_details($totalPlan){
        $planList = Plan::with('marketAiQuestion','businessAiQuestion','competitionAiQuestion','corporateAiQuestion','investmentAiQuestion','financialAiQuestion' , 'fundAiQuestion' ,'intellectualAiQuestion', 'teamAiQuestion' ,'tractionAiQuestion')
                            ->where('status' , 'accepted')
                            ->orderBy('id','desc')
                            ->offset($totalPlan)->limit(6)->get();
        return $planList;
    }

    public function get_project_details($id)
    {
        $plan = Plan::with(
                        'marketAnswer.question' , 'tractionAnswer.question' , 'teamAnswer.question' , 'competitionAnswer.question','financialAnswer.question','fundAnswer.question','intellectualAnswer.question','corporateAnswer.question','businessAnswer.question','investmentAnswer.question',
                        'marketAiQuestion','businessAiQuestion','competitionAiQuestion','corporateAiQuestion','investmentAiQuestion','financialAiQuestion' , 'fundAiQuestion' ,'intellectualAiQuestion', 'teamAiQuestion' ,'tractionAiQuestion'
                        )
                            ->where('id' , $id)
                            ->orderBy('id','desc')
                            ->first();
        return $plan;
    }


}


?>