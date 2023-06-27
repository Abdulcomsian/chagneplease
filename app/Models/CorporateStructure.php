<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class CorporateStructure extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "Corporate_structures";
    
    protected $fillable = [
        'plan_id',
        'organized_company',
        'hold_titles',
        'split_shares',
        'existing_board',
        'registered_company',
        'account_handling',
        'talent_skills',
        'selected_founder',
        'employee_selector',
        'registered_agent',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
