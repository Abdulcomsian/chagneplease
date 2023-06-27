<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ ScreeningQuestion , Plan };

class ScreeningAnswer extends Model
{
    use HasFactory;

    protected $table = "screening_answer";
    protected $primaryKey = "id";
    protected $fillable = ["plan_id" , "screening_id" , "answer" ];


    public function screeningQuestion()
    {
        return $this->belongsTo(ScreeningQuestion::class , 'screening_id' , 'id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id' , 'id');
    }

}
