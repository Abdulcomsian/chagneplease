<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Plan , GeneralQuestion};
class GeneralAnswer extends Model
{
    use HasFactory;

    protected $table = "general_answers";
    protected $primaryKey = "id";
    protected $fillable = ['plan_id' , 'question_id' , 'answer']; 

    public function plan(){
        return $this->belongsTo(Plan::class , 'plan_id' , 'id');
    }

    public function question(){
        return $this->belongsTo(GeneralQuestion::class , 'question_id' , 'id');
    }

}
