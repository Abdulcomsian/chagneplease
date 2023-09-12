<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionCategory;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // QuestionCategory::truncate();
        
        $categoryList = [
            ["title" =>  "Market & Impact"],
            ["title" =>  "Traction & Sustainability"],
            ["title" =>  "Team & Governance"],
            ["title" =>  "Competition & Differentiation"],
            ["title" =>  "Financials & Resilience"],
            ["title" =>  "Intellectual Property"],
            ["title" =>  "Use of Funds"],
            ["title" =>  "Business Model & Impact Measurement"],
            ["title" =>  "Corporate Structure"],
            ["title" =>  "Investment Round Details"],
        ];

        QuestionCategory::insert($categoryList);
    }
}
