<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Team extends Model
{
    use HasFactory;
    
    protected $table = "teams";

    protected $primaryKey = "id";

    protected $fillable = [
        'plan_id',
        'headquarter',
        'founders',
        'team_members',
        'board_members',
        'roles',
        'experience',
        'right_person',
        'motivation',
        'founder',
        'responsible_idea',
        'rating'
    ];

    public function Plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id' ,'id');
    }
    
}
