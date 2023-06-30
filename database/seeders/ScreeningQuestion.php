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

       $languages =  [
            "English (eng)",
            "Spanish (spa)",
            "Chinese (zho)",
            "Hindi (hin)",
            "Arabic (ara)",
            "Bengali (ben)",
            "Russian (rus)",
            "Portuguese (por)",
            "Indonesian (ind)",
            "French (fra)",
            "German (deu)",
            "Japanese (jpn)",
            "Swahili (swa)",
            "Tamil (tam)",
            "Urdu (urd)",
            "Turkish (tur)",
            "Korean (kor)",
            "Italian (ita)",
            "Thai (tha)",
            "Polish (pol)",
            "Dutch (nld)",
            "Malay (msa)",
            "Vietnamese (vie)",
            "Persian (fas)",
            "Telugu (tel)",
            "Ukrainian (ukr)",
            "Romanian (ron)",
            "Hungarian (hun)",
            "Swedish (swe)",
            "Czech (ces)",
            "Hebrew (heb)",
            "Greek (ell)",
            "Danish (dan)",
            "Norwegian (nor)",
            "Finnish (fin)",
            "Icelandic (isl)",
            "Filipino (fil)",
            "Catalan (cat)",
            "Slovak (slk)",
            "Serbian (srp)",
            "Croatian (hrv)",
            "Slovenian (slv)",
            "Lithuanian (lit)",
            "Latvian (lav)",
            "Estonian (est)"
        ];

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
                                    [
                                        "type" => "select",
                                        "question" => "What languages do you support?",
                                        "options" => json_encode($languages),
                                        "name" => "language"
                                    ],
            ];


            Question::insert($screeningQuestions);
            
    }
}
