<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    use HasFactory;

    protected $table = "competitions";

    protected $primaryKey = "id";


    protected $fillable = [
        'plan_id',
        'competitors',
        'advantages',
        'disadvantages',
        'barriers',
        'letting_down',
        'competitors_not_done',
        'differ_feature',
        'compare_price',
        'compare_service',
        'customer_satisfaction',
        'rating'
    ];

    public function Plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id' ,'id');
    }
}
