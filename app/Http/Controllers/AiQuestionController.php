<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ArtificialQuestion;

class AiQuestionController extends Controller
{
    protected $aiQuestion;

    function __construct(ArtificialQuestion $aiQuestion)
    {
        $this->aiQuestion = $aiQuestion;    
    }

    public function createAiQuestion(Request $request)
    {
       return  $this->aiQuestion->generateAIQuestion($request);
    }

    public function createAiBonusQuestion(Request $request)
    {
        return $this->aiQuestion->generateBonusAiQuestion($request);
    }

    public function addAiBonusQuestion(Request $request)
    {
        return $this->aiQuestion->addBonusQuestion($request);
    }

    public function clearQuestions(Request $request)
    {
        return $this->aiQuestion->clearFormQuestion($request);
    }
}
