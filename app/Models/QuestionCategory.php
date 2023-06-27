<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GeneralQuestion;
class QuestionCategory extends Model
{
    use HasFactory;

    protected $table = "question_category";
    protected $primaryKey = "id";
    protected $fillable = ["title"];


    public function question()
    {
        return $this->hasMany(GeneralQuestion::class , 'category_id' , 'id');
    }


}
