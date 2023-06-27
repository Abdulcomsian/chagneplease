<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralQuestion extends Model
{
    use HasFactory;

    public function scopeMarket($query)
    {
        return $query->where('category_id',1);
    }

    public function scopeTraction($query)
    {
        return $query->where('category_id',2);
    }

    public function scopeTeam($query)
    {
        return $query->where('category_id',3);
    }

    public function scopeCompetition($query)
    {
        return $query->where('category_id',4);
    }

    public function scopeFinancial($query)
    {
        return $query->where('category_id',5);
    }

    public function scopeIntellectual($query)
    {
        return $query->where('category_id',6);
    }

    public function scopeFund($query)
    {
        return $query->where('category_id',7);
    }

    public function scopeBusiness($query)
    {
        return $query->where('category_id',8);
    }

    public function scopeCorporate($query)
    {
        return $query->where('category_id',9);
    }

    public function scopeInvestment($query)
    {
        return $query->where('category_id',10);
    }
}
