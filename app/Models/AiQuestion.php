<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ Plan , Feedback};


class AiQuestion extends Model
{
    use HasFactory;

    protected $table = "ai_question";
    protected $primaryKey = "id";
    protected $fillable = ["plan_id" , "question_category_id" , "question" , "answer" , "ai_rating" , "analyst_rating"];

    public function plan()
    {
        return $this->belongsTo(Plan::class , "plan_id" , "id");
    }

    public function feedbacks()
    {
        return $this->morphMany(Feedback::class, 'feedbackable');
    }

}
