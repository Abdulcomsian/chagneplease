<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminRegister;
use Database\Seeders\AnalystRegister;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminRegister::class);
        $this->call(AnalystRegister::class);
        $this->call(QuestionCategorySeeder::class);
        $this->call(ScreeningQuestion::class);
        $this->call(GeneralQuestionSeeder::class);
    }
}
