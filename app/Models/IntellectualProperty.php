<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntellectualProperty extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "intellectual_properties";
    protected $fillable = [
        'plan_id',
        'unique_company',
        'problem_solve',
        'legal_risk',
        'product_liability',
        'regulatory_risk',
        'intellectual_property',
        'developed_intellectual_property',
        'person_left',
        'additional_partner',
        'current_intellectual_assets',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
