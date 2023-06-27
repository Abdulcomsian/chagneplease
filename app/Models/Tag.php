<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    
    protected $PrimaryKey = 'tag_id';

    public $timestamps = false;

    protected $fillable = [
            'title'
    ];
}
