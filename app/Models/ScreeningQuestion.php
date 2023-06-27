<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ ScreeningAnswer };

class ScreeningQuestion extends Model
{
    use HasFactory;

    protected $table = "screening_questions";
    protected $primaryKey = "id";
    protected $fillable = ["type" , "question" , "options" , "name" ];

}
