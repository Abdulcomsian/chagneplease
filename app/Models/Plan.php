<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ 
    User,
    Market,
    BusinessModel,
    Competitions,
    CorporateStructure,
    ExistingFinancial,
    Financial,
    Funds,
    IntellectualProperty,
    Team,
    Traction,
    ScreeningAnswer,
    GeneralAnswer,
    AiQuestion,
    AiBonusQuestion,
 };

class Plan extends Model
{
    use HasFactory;
    protected $table = "plans";
    protected $primaryKey = "id";
    protected $fillable = [ "user_id", "company_name", "size","investment","amount","country", "city", "category","address","postal_code","company_logo","video", "status" ,"description" ];

    public function Investee()
    {
        return $this->belongsTo(User::class , 'user_id' , "id");
    }

    public function Market()
    {
        return $this->hasOne(Market::class , 'plan_id' ,'id');
    }

    public function BusinessModel()
    {
        return $this->hasOne(BusinessModel::class , 'plan_id' ,'id');
    }

    public function Competition()
    {
        return $this->hasOne(Competitions::class , 'plan_id' ,'id');
    }

    public function CorporateStructure()
    {
        return $this->hasOne(CorporateStructure::class , 'plan_id' ,'id');
    }

    public function ExistingFinancial()
    {
        return $this->hasOne(ExistingFinancial::class , 'plan_id' ,'id');
    }

    public function Financial()
    {
        return $this->hasOne(Financial::class , 'plan_id' ,'id');
    }

    public function Fund()
    {
        return $this->hasOne(Funds::class , 'plan_id' ,'id');
    }

    public function IntellectualProperty()
    {
        return $this->hasOne(IntellectualProperty::class , 'plan_id' ,'id');
    }

    public function Team()
    {
        return $this->hasOne(Team::class , 'plan_id' ,'id');
    }

    public function Traction()
    {
        return $this->hasOne(Traction::class , 'plan_id' ,'id');
    }

    public function screeningAnswer()
    {
        return $this->hasMany(ScreeningAnswer::class , 'plan_id' , 'id');
    }

    public function marketAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 1);    
                    });
    }

    public function marketAiQuestion()
    {
        return $this->hasMany(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 1)->first();
    }

    public function marketBonusQuestion()
    {
        return $this->hasMany(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 1)->first();
    }

    


}
