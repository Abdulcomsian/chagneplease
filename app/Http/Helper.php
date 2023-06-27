<?php 

namespace App\Http;
use App\Models\Plan;

class Helper{

    public static function plan($id)
    {
        $plan = Plan::with('Market', 'Team', 'Traction', 'Competition', 'BusinessModel', 'CorporateStructure', 'ExistingFinancial', 'Financial', 'Fund', 'IntellectualProperty')
                    ->where('id' , $id)
                    ->first();
        return $plan;
    }

}