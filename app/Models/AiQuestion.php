<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class AiQuestion extends Model
{
    use HasFactory;

    protected $table = "ai_question";
    protected $primaryKey = "id";
    protected $fillable = ["plan_id" , "question_category_id" , "question" , "answer"];

    public function plan()
    {
        return $this->belongsTo(Plan::class , "plan_id" , "id");
    }
}
