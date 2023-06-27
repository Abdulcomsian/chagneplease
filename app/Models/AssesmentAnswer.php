<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ AssesmentQuestion , Plan };

class AssesmentAnswer extends Model
{
    use HasFactory;

    protected $table = "assesment_answers";
    protected $primaryKey = "id";
    protected $fillable = ["question_id" , "plan_id" , "answer"];

    public function question()
    {
        return $this->belongsTo(AssesmentQuestion::class , "question_id" , "id");
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class , "plan_id" , "id");
    }
}
