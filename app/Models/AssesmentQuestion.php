<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ AssesmentAnswer };

class AssesmentQuestion extends Model
{
    use HasFactory;
    
    protected $table = "assesment_questions";
    protected $primaryKey = "id";
    protected $fillable = ["question"];

    public function answers()
    {
        return $this->hasMany(AssesmentAnswer::class , 'question_id' , 'id');
    }
}
