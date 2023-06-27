<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Traction extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "tractions";
    
    protected $fillable = [
        'plan_id',
        'feedback',
        'changes',
        'actual_user',
        'average_stay',
        'actual_sales',
        'annual_growth',
        'growth_rate',
        'growth_linear_consistent',
        'held_back',
        'demonstration',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 

    
}
