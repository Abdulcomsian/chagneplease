<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{GeneralQuestion};

class GeneralQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $marketQuestion = [
            ["category_id" => 1 , "question" => "Who are your target customers and what problem are you solving for them?" ],
            ["category_id" => 1 , "question" => "What is the size of your target market?" ],
            ["category_id" => 1 , "question" => "What percentage of the market share do you hope to capture?" ],
            ["category_id" => 1 , "question" => "What kind of social/environmental impact does your product or service have?" ],
        ];

        $tractionQuestion = [
            ["category_id" => 2 , "question" => "What key milestones have you reached so far?" ],
            ["category_id" => 2 , "question" => "How many active users/customers do you have?" ],
            ["category_id" => 2 , "question" => "What sustainability measures are integrated into your product/service?" ],
        ];


        $teamQuestion = [
            ["category_id" => 3 , "question" => "Who are your key team members and what experience do they bring?" ],
            ["category_id" => 3 , "question" => "What key roles do you need to fill?" ],
            ["category_id" => 3 , "question" => "How would you describe your company culture?" ],
            ["category_id" => 3 , "question" => "What are your governance structures and ethical policies?" ],
        ];


        $competitionQuestion = [
            ["category_id" => 4 , "question" => "Who are your main competitors?" ],
            ["category_id" => 4 , "question" => "What sets your product/service apart from the competition?" ],
            ["category_id" => 4 , "question" => "How does your impact orientation provide you with a competitive edge?" ],
        ];

        $financialQuestion = [
            ["category_id" => 5 , "question" => "What is your current financial status?" ],
            ["category_id" => 5 , "question" => "What is your revenue model and cost structure?" ],
            ["category_id" => 5 , "question" => "How is your company prepared to adapt to future changes and contingencies?" ],
        ];

        $intellectualQuestion = [
            ["category_id" => 6 , "question" => "Do you have any unique technology or solution?" ],
            ["category_id" => 6 , "question" => "Do you have any patents or how do you protect your intellectual property?" ],
        ];

        $fundQuestion = [
            ["category_id" => 7 , "question" => "How do you plan to use the investment you are raising?" ],
            ["category_id" => 7 , "question" => "How will this contribute to both profitability and impact?" ],
        ];

        $businessQuestion = [
            ["category_id" => 8 , "question" => "How do you acquire customers and scale your business?" ],
            ["category_id" => 8 , "question" => "How do you measure and report your social/environmental impact?" ],
        ];

        $corporateQuestion = [
            ["category_id" => 9 , "question" => "What is the legal structure of your company?" ],
            ["category_id" => 9 , "question" => "How is ownership and control distributed?" ],
        ];

        $investmentQuestion = [
            ["category_id" => 10 , "question" => "What is the amount you are looking to raise in this round?" ],
            ["category_id" => 10 , "question" => "What equity is being offered and at what valuation?" ],
            ["category_id" => 10 , "question" => "What are the terms of the deal?" ],
        ];

        $questionList = [
            ...$marketQuestion , 
            ...$tractionQuestion , 
            ...$teamQuestion , 
            ...$competitionQuestion , 
            ...$financialQuestion , 
            ...$intellectualQuestion ,
            ...$fundQuestion ,
            ...$businessQuestion ,
            ...$corporateQuestion ,
            ...$investmentQuestion
        ];

        GeneralQuestion::insert($questionList);

    }
}
