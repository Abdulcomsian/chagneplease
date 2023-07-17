<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AiQuestion;

class AiReport extends Model
{
    use HasFactory;

    protected $table = "ai_report";
    protected $primaryKey = "id";
    protected $fillable = ["ai_id" , "report"];

    public function aiQuestion(){
        return $this->belongsTo(AiQuestion::class , 'ai_id' , 'id');
    }


}
