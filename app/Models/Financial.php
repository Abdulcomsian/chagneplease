<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Financial extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "financials";
    
    protected $fillable = [
        'plan_id',
        'product_marketing',
        'marketing_budget',
        'acquisition_cost',
        'lifetime_value',
        'equity_debt',
        'fundraising',
        'burn_rate',
        'time_period',
        'metrics_key',
        'stock_options',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
