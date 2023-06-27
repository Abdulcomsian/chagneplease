<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistingFinancial extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "existing_financials";
    
    protected $fillable = [
        'plan_id',
        'exit_goal',
        'expected_time_frame',
        'help_exit',
        'follow_up_round',
        'valuation',
        'current_valuation',
        'current_raisings',
        'previous_investor',
        'next_milestone',
        'investor_help',
        'total_customer',
        'operation_country',
        'founded_date',
        'full_time_employee',
        'maturity',
        'annual_revenue',
        'projected_revenue',
        'net_profit',
        'cach_balance',
        'funding_request',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
