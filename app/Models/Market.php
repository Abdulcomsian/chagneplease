<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Plan};
class Market extends Model
{
    use HasFactory;
    protected $table = "markets";
    protected $primaryKey = "id";
    protected $fillable =["plan_id" , "market_opportunity" , "market_share" , "customer" , "time_taken" , "figures" , "pr_strategy" , "aspire", "least_like" ,"right_time" ,"strategy" ,"status",'rating'];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class , "plan_id" , "id");
    }

}
