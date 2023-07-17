<?php 

namespace App\Http\Repository;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\{ AiQuestion , GeneralAnswer, Plan , AiBonusQuestion, GeneralQuestion , QuestionCategory , FeedBack};

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

        // dd($plan);

        $planCurrentStage = $plan->screeningAnswer[0]->answer;
        $planCurrentCategory = $plan->screeningAnswer[2]->answer;

        // $prompt = "Consider a company at the $planCurrentStage stage, operating in the $planCurrentCategory industry\n
        //             The company is located in $plan->city , $plan->country , and their target audience is\n
        //             The company's mission, as described in their executive summary, is: '$plan->description'\n
        //             Given this information,                    
        //             please generate six specific in depth questions an investment analyst might ask that would help better understand the company's $planCurrentCategory\n 
        //             These questions should be designed to extract further detail about the company's strategy, competitive positioning,\n 
        //             and plans for growth in the context of their impact goals.\n";
        

            $prompt = "Consider a company at the $planCurrentStage stage, operating in the $planCurrentCategory industry.\n
                    The company is located in $plan->city, $plan->country, and their target audience is the local market.\n
                    The company's mission, as described in their executive summary, is: '$plan->description'.\n
                    Given this information, I would like to further explore their potential and strategy in the $planCurrentCategory category.\n
                    Therefore, generate six unique and in-depth questions an investment analyst might ask specifically related to this category. \n
                    Each question should aim to extract further detail about different aspects of the company's strategy, competitive positioning, \n
                    and plans for growth in the context of their impact goals. \n";

        $prompt .= "company has submitted following answers to the questions related to $planCurrentCategory:\n";

        foreach($plan->screeningAnswer as $answer)
        {
            $question = $answer->screeningQuestion->question;
            $questionAnswer   = $answer->answer;
            $prompt .= "Question: $question ?\n, Answer: $questionAnswer.. \n";
        }
        $prompt .= "They have also provided answers to questions specifically related to the $questionType Research section while applying for investment. \n";

        // $prompt .= " Below question are related to $questionType  while applying for raising investment. \n";

        foreach($questionList as $qt)
        {
            $question = $qt["question"];
            $answer = $qt["answer"];
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

      
        // $prompt .= "Please consider above $questionType question and also screening question, please create at least 6 more new questions related to $questionType question with no answer";
        // $prompt .= "considering above information create new 6 in depth questions  an investment analyst might ask that would help better understand the company's related to $questionType";
        // $prompt .= "Please create questions in array form question format should be like 1) What is you current model? Question should be in $plan->language language. ";
        
        $prompt .= "Given all the above information, please formulate six new questions that an investment analyst might ask that would help better understand the company's related to $questionType \n";
        $prompt .= "Ensure that the questions are diverse, covering different facets of the category, and are tailored based on the information provided by the company so far. \n";
        $prompt .= "The questions should be presented in an ordered list and written in $plan->language. \n Please add a tag questionStart before starting question list? before starting questions add label 'questionStartHere' and at end add this label 'questionEndsHere' ";
        
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 350,
            'temperature' => 0.8
        ]);

        // $moreQuestions = explode("?" , str_replace("\n" ,"", $result['choices'][0]['text']));
        $moreQuestions = str_replace("\n" ,"", $result['choices'][0]['text']);
        $moreQuestions = rtrim( ltrim($moreQuestions , "[QuestionStartHere") , "QuestionEndsHere]");
        $moreQuestions = rtrim( ltrim($moreQuestions , "[questionStartHere") , "questionEndsHere]");
        $moreQuestions = ltrim($moreQuestions , "_StartHere");
        $moreQuestions = rtrim($moreQuestions , "Question Ends");
        $moreQuestions = explode("?" , $moreQuestions);



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

        $planCurrentStage = $plan->screeningAnswer[0]->answer;
        $planCurrentCategory = $plan->screeningAnswer[2]->answer;

        $prompt = "Consider a company at the $planCurrentStage stage, operating in the $planCurrentCategory industry\n
                    The company is located in $plan->city , $plan->country , and their target audience is\n
                    The company's mission, as described in their executive summary, is: '$plan->description'\n
                    Given this information,
                    please generate six specific questions that could help better understand the company's $plan->category.\n 
                    These questions should be designed to extract further detail about the company's strategy, competitive positioning,\n 
                    and plans for growth in the context of their impact goals.\n";

        // $prompt = "$plan->company_name is a Company, company resides in $plan->city , $plan->country .Company have a plan, company have a size $plan->size , company need an investment of $plan->investment , company raised amount of total $plan->amount ";
        // $prompt .= ", company give screening answer these are question and their respective answer\n\n";
        $prompt .= "company has submitted its screening question:\n";

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

        for($i =0; $i < sizeof($aiQuestion); $i++)
        {
            $question = $aiQuestion[$i];
            $answer = $aiAnswer[$i]; 
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

        $prompt .="Please consider above $questionType question and also screening question, please create 3 new questions related to $questionType question with no answer";

        $prompt .="Please create question in array form question format should be like 1) What is you current model? Question should be in $plan->language language. Please add a tag questionStart before starting question list? before starting questions add label 'questionStartHere' and at end add this label 'questionEndsHere' ";

        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 200,
            'temperature' => 0.8
        ]);

        $moreQuestions = str_replace("\n" ,"", $result['choices'][0]['text']);
        $moreQuestions = rtrim( ltrim($moreQuestions , "[QuestionStartHere") , "QuestionEndsHere]");
        $moreQuestions = rtrim( ltrim($moreQuestions , "[questionStartHere") , "questionEndsHere]");
        $moreQuestions = ltrim($moreQuestions , "_StartHere");
        $moreQuestions = rtrim($moreQuestions , "Question Ends");
        $moreQuestions = explode("?" , $moreQuestions);
        
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
          $answers = [];

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

    public function clearFormQuestion($request)
    {
        try{
            $questionCategory = $request->questionCategory;
            $planId = $request->planId;
    
            $questionArray = GeneralQuestion::where('category_id' , $questionCategory)->get()->pluck('id')->toArray();
            
            GeneralAnswer::whereIn('id' , $questionArray)->where('plan_id' , $planId)->delete();
    
            AiQuestion::where('plan_id' , $planId)->where('question_category_id' , $questionCategory)->delete();
    
            AiBonusQuestion::where('plan_id' , $planId)->where('question_category_id' , $questionCategory)->delete();
    
            return response()->json(['success' => true , 'msg' => 'Question Cleared Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false , 'msg' => $e->getMessage()]);
        }

    }

    public function saveAiQuestion($request)
    {
        try{
        $planId = $request->planId;
        $category = $request->category;
        $questionList = $request->aiQuestion;

        $questions = [];
        $answers = [];

        foreach($questionList as $question)
        {
            $questions[] = $question['question'];
            $answers[] = $question['answer'];
        }

        $questions = json_encode($questions);
        $answers = json_encode($answers);

        //new code starts here

        $generalAnswer  = GeneralAnswer::with('plan.screeningAnswer.screeningQuestion','question')->where('plan_id' , $planId)->first();
        $categoryTitle = QuestionCategory::where('id' , $category )->first()->title;
        $plan = $generalAnswer->plan;

        $planCurrentStage = $plan->screeningAnswer[0]->answer;
        $planCurrentCategory = $plan->screeningAnswer[2]->answer;

        $prompt = "Consider a company at the $planCurrentStage stage, operating in the $planCurrentCategory industry\n
                    The company is located in $plan->city , $plan->country , and their target audience is\n
                    The company's mission, as described in their executive summary, is: '$plan->description'\n
                    Given this information,
                    please generate six specific questions that could help better understand the company's $plan->category.\n 
                    These questions should be designed to extract further detail about the company's strategy, competitive positioning,\n 
                    and plans for growth in the context of their impact goals.\n";

        $prompt .= "company has submitted its screening question:\n";

        foreach($plan->screeningAnswer as $answer)
        {
            $question = $answer->screeningQuestion->question;
            $questionAnswer   = $answer->answer;
            $prompt .= "$question ?\n, Answer: $questionAnswer.. \n";
        }

        $prompt .= " Below question are related to $categoryTitle Research section while applying for raising investment. \n";

        foreach($questionList as $qt)
        {
            $question = $qt["question"];
            $answer = $qt["answer"];
            $prompt .= "$question \n";
            $prompt .= "Answer: $answer \n";
        }

        $prompt .= "Consider above question and answer please give me overall rating out of 10, only give me rating number";


        $rating = $this->recursiveAi($prompt);
       
        //new code ends here

        AiQuestion::updateOrCreate(
            [
                'plan_id' => $planId,
                'question_category_id' => $category,
            ],
            [ 
                'plan_id' => $planId,
                'question_category_id' => $category,
                'question' => $questions,
                'answer' => $answers,
                'ai_rating' => $rating
            ]
        );

            return response()->json(["success" => true , "msg" => "Question Added Successfully"]);
        
        }catch(\Exception $e){

            return response()->json(["success" => false , "msg" => $e->getMessage()]);
        
        }
    }

    public function recursiveAi($prompt)
    {
        $checkArray = ["" , null];

        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 5,
            'temperature' => 0.2
        ]);


        $rating  = (int)preg_replace("/[^0-9]/", "" , $result['choices'][0]['text']);

        if(in_array( $rating , $checkArray) || gettype($rating) !== "integer" )
        {
            $this->recursiveAi($prompt);
        }

        return $rating;

    }



    public function saveAiAnalystRating($request)
    {
        try{
            $score = $request->score;
            $feedback = $request->feedback;
            $feedbackableType = "App\Models\AiQuestion";
            $planId = $request->planId;
            $questionCategory = $request->questionCategory;
            
            $aiQuestion = AiQuestion::where('plan_id',$planId)->where('question_category_id' , $questionCategory)->first();
            $aiQuestion->analyst_rating = $score;
            $aiQuestion->save();

            $check = [null , ""];
            if(!in_array( trim($feedback) , $check))
            {
                Feedback::create([
                    "feedbackable_id"  => $aiQuestion->id,
                    "feedbackable_type" => $feedbackableType,
                    "description" => $feedback,
                    "analyst_id"  => auth()->user()->id,
                ]);
            }

            return response()->json(['success' => true , 'msg' => 'Analyst Rating Saved Successfully']);
        }catch(\Exception $e){
            return response()->json(['success' => false , 'msg' => $e->getMessage()]);
        }
    }


}