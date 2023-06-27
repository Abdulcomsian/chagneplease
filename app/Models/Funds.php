<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Funds extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    
    protected $table = "funds";
    
    protected $fillable = [
        'plan_id',
        'funds_allocated',
        'spent',
        'expansion',
        'not_recieved_money',
        'asset_invested',
        'milestones',
        'biggest_risks',
        'raising_capitals',
        'fundraising_efforts',
        'personal_expenses',
        'rating'
    ];
    
    public function Plan()
    {
        return $this->belongsTo(Plan::class ,'plan_id' ,'id');
    } 
}
