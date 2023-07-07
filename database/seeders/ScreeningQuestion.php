<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ ScreeningQuestion as Question};

class ScreeningQuestion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    $screeningQuestions =    [
                                    [
                                        "type" => "select",
                                        "question" => "What is your company's current stage of development?",
                                        "options" => json_encode(["Pre-Seed Funding", "Seed Funding", "Series A", "Series B", "Series C", "Series D", "Series E", "Series F", "Series G", "Mezzanine Financing and Bridge Loans", "Pre-IPO Stage", "Initial Public Offering (IPO)", "Post-IPO Equity"]),
                                        "name"  => "stage",
                                    ],
                                    [
                                        "type" => "textarea",
                                        "question" => "Can you provide an executive summary of your company? (A brief description of your business, mission, business model, and strategic direction.) (max 500 words)",
                                        "options" => null,
                                        "name"  => "summary",
                                    ],
                                    [
                                        "type" => "input",
                                        "question" => "Which industry sector does your company operate in?",
                                        "options" => null,
                                        "name" => "industry_sector"
                                    ],
                                    [
                                        "type" => "input",
                                        "question" => "Where is your company geographically located?",
                                        "options" => null,
                                        "name" => "geographically_location"
                                    ],
                                    [
                                        "type" => "input",
                                        "question" => "Who is your target audience or customer base? Please provide as much detail as possible.",
                                        "options" => null,
                                        "name" => "targeted_audience"
                                    ],
            ];


            Question::insert($screeningQuestions);
            
    }
}
