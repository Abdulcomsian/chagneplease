<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedbacks";

    protected $primaryKey = "id";

    public $fillable = [ 'description' , 'feedbackable_type' , 'analyst_id' , 'feedbackable_id' ];

    public function feedbackable(){
        
        return $this->morphTo();

    }

}
