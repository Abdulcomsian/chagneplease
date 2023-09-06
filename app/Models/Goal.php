<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Plan};

class Goal extends Model
{
    use HasFactory;

    protected $table = 'goals';
    protected $primaryKey = 'id';
    protected $fillable = ['plan_id' , 'title'];

    public function plan()
    {
        return $this->belongsTo(Plan::class  , 'plan_id' , 'id');
    }

}
