<?php 

namespace App\Http\Repository;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\{ AiQuestion , GeneralAnswer, Plan , AiBonusQuestion  };

class ArtificialQuestion{

    public function generateAIQuestion($request)
    {
        try{

        $planId = $request->planId;
        $questionList = $request->questionList;
        $questionType = $request->questionType;

        foreach($questionList as $ql)
        {
            GeneralAnswer::updateOrCreate(
                ['plan_id' => $planId  , "question_id" => $ql['questionId'] ],
                ["plan_id" => $planId , "question_id" => $ql['questionId'] , "answer" => $ql['answer'] ]
            );
        }


        $plan = Plan::with('screeningAnswer.screeningQuestion')->where('id', $planId)->first();

        $prompt = "$plan->company_name is a Company, company resides in $plan->city , $plan->country .Company have a plan, company have a size $plan->size , company need an investment of $plan->investment , company raised amount of total $plan->amount ";
        $prompt .= ", company give screening answer these are question and their respective answer\n\n";

        foreach($plan->screeningAnswer as $answer)
        {
            $question = $answer->screeningQuestion->question;
            $questionAnswer   = $answer->answer;
            $prompt .= "$question ?\n, Answer: $questionAnswer.. \n";
        }

        $prompt .= " Below question are related to $questionType.. \n";

        foreach($questionList as $qt)
        {
            $question = $qt["question"];
            $answer = $qt["answer"];
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

      
        $prompt .= "Please consider above $questionType question and also screening question, please create at least 6 more new questions related to $questionType question with no answer";

        $prompt .="Please create question in array form question format should be like 1) What is you current model? Please add a tag questionStart before starting question list?";
        

        
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 1000
        ]);


        // rich people and baby boomers, difficult in marketing 
        // at least 100000 are potential customer
        // at least 25% in a year
        // my service help user to find their dream property
        // http://127.0.0.1:8000/investee-questions/15

        $moreQuestions = explode("?" , str_replace("\n" ,"", $result['choices'][0]['text']));
        // dd($moreQuestions);

        $html = view('components.aiGeneratedQuestion' , ['questions' => $moreQuestions])->render();

        return response()->json(["success" => true, "msg" => "Answer Added Successfully" ,   "extraQuestion" => $html]);
    
        }catch(\Exception $e)
        {
            return response()->json(["success" => false , "msg" => $e->getMessage()]);
        }
        
    }


    public function generateBonusAiQuestion($request)
    {
        try{
        $planId = $request->planId;
        $questionList = $request->questionList;
        $aiQuestion = $request->aiQuestion;
        $questionType = $request->questionType;
        $questionCategory = $request->questionCategory;


        $questions = [];
        $answers = [];

        foreach($questionList as $question)
        {
            $questions[] = $question['question'];
            $answers[] = $question['answer'];
        }

        $questions = json_encode($questions);
        $answers = json_encode($answers);

        AiQuestion::updateOrCreate(
            [
                'plan_id' => $planId,
                'question_category_id' => $questionCategory,
            ],
            [ 
                'plan_id' => $planId,
                'question_category_id' => $questionCategory,
                'question' => $questions,
                'answer' => $answers
            ]
    );


        $plan = Plan::with('screeningAnswer.screeningQuestion')->where('id', $planId)->first();
        $aiQuestions = AiQuestion::where('plan_id' , $planId)->where('question_category_id' , $questionCategory)->first();

        $prompt = "$plan->company_name is a Company, company resides in $plan->city , $plan->country .Company have a plan, company have a size $plan->size , company need an investment of $plan->investment , company raised amount of total $plan->amount ";
        $prompt .= ", company give screening answer these are question and their respective answer\n\n";

        foreach($plan->screeningAnswer as $answer)
        {
            $question = $answer->screeningQuestion->question;
            $questionAnswer   = $answer->answer;
            $prompt .= "$question ?\n, Answer: $questionAnswer.. \n";
        }

        $prompt .= " Below question are related to $questionType.. \n";

        foreach($questionList as $qt)
        {
            $question = $qt["question"];
            $answer = $qt["answer"];
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

        $prompt .=" Below question are related also to $questionType.. \n";

        $aiQuestion = json_decode($aiQuestions->question);
        $aiAnswer = json_decode($aiQuestions->answer);

        for($i =0; $i<= sizeof($aiQuestion); $i++)
        {
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

        $prompt .="Please consider above $questionType question and also screening question, please create at most 4 more new questions related to $questionType question with no answer";

        $prompt .="Please create question in array form question format should be like 1) What is you current model? Please add a tag questionStart before starting question list?";

        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 1000
        ]);

        $moreQuestions = explode("?" , str_replace("\n" ,"", $result['choices'][0]['text']));
        
        $html = view('components.aiGeneratedQuestion' , ['questions' => $moreQuestions])->render();

        return response()->json(["success" => true, "msg" => "Question Added Successfully" ,"bonusQuestion" => $html]);
    
        }catch(\Exception $e)
        {
            return response()->json(["success" => false , "msg" => $e->getMessage()]);
        }

    }


    public function addBonusQuestion($request)
    {
        try{
          $planId = $request->planId;
          $questionCategory = $request->questionCategory;
          $bonusQuestion  = $request->bonusQuestion;

          $question = [];
          $answer = [];

          foreach($bonusQuestion as $question)
          {
            $questions[] = $question['question'];
            $answers[] = $question['answer'];
          }

          $questions = json_encode($questions);
          $answers = json_encode($answers);

          AiBonusQuestion::updateOrCreate(
            [
                'plan_id' => $planId,
                'question_category_id' => $questionCategory,
            ],
            [ 
                'plan_id' => $planId,
                'question_category_id' => $questionCategory,
                'question' => $questions,
                'answer' => $answers
            ]
        );

        return response()->json(["success"=> true , "msg" => "Bonus Question Added Successfully"]);
    
    }catch(\Exception $e){
        
        return response()->json(["success"=> false , "msg" => "Something Went Wrong" , "error" => $e->getMessage() ]);
    
    }

    }

}