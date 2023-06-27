<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class BusinessModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "business_models";
    
    protected $fillable = [
        'plan_id',
        'specific_channels',
        'marketing_channels',
        'plan_b',
        'profit_margin',
        'scalling_impact',
        'pivots',
        'replaceable',
        'customer_story',
        'unique_feature',
        'revenue_stream',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
