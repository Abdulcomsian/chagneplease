<?php

namespace App\Http\Repository;
use App\Models\Plan;

class Home{
    
    public function get_home_details($totalPlan){
        // $user = auth()->user();
        $planList = Plan::with('Market','BusinessModel','Competition','CorporateStructure','ExistingFinancial','Financial' , 'Fund' ,'IntellectualProperty', 'Team' ,'Traction')
                            ->where('status' , 'accepted')
                            ->orderBy('id','desc')
                            ->offset($totalPlan)->limit(6)->get();
        return $planList;
    }

    public function get_project_details($id)
    {
        $plan = Plan::with('Market','BusinessModel','Competition','CorporateStructure','ExistingFinancial','Financial' , 'Fund' ,'IntellectualProperty', 'Team' ,'Traction')
                            ->where('id' , $id)
                            ->orderBy('id','desc')
                            ->first();
        return $plan;
    }


}


?>