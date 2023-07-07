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
    protected $fillable = [ "user_id", "company_name", "size","investment","amount","country", "city", "language" ,"address","postal_code","company_logo","video", "status" ,"description" ];

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

    public function tractionAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 2);    
                    });
    }

    public function teamAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 3);    
                    });
    }

    public function competitionAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 4);    
                    });
    }

    public function financialAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 5);    
                    });
    }

    public function intellectualAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 6);    
                    });
    }

    public function fundAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 7);    
                    });
    }

    public function businessAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 8);    
                    });
    }

    public function corporateAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 9);    
                    });
    }

    public function investmentAnswer(){
        return $this->hasMany(GeneralAnswer::class , 'plan_id' , 'id')
                    ->whereHas('question' , function($query){
                        $query->where('category_id' , 10);    
                    });
    }



    public function marketAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 1);
    }

    public function marketBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 1);
    }

    public function tractionAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 2);
    }

    public function tractionBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 2);
    }

    public function teamAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 3);
    }

    public function teamBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 3);
    }

    public function competitionAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 4);
    }

    public function competitionBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 4);
    }

    public function financialAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 5);
    }

    public function financialBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 5);
    }

    public function intellectualAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 6);
    }

    public function intellectualBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 6);
    }

    public function fundAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 7);
    }

    public function fundBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 7);
    }

    public function businessAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 8);
    }

    public function businessBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 8);
    }

    public function corporateAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 9);
    }

    public function corporateBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 9);
    }

    public function investmentAiQuestion()
    {
        return $this->hasOne(AiQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 10);
    }

    public function investmentBonusQuestion()
    {
        return $this->hasOne(AiBonusQuestion::class , 'plan_id' , 'id')->where('question_category_id' , 10);
    }

}
