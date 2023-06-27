<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class PlanConclusion extends Model
{
    use HasFactory;
    protected  $table = "plan_conclusion";
    protected  $primaryKey = "id";
    protected  $fillable = ['video_url' , 'plan_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id' , 'id');
    }
}
