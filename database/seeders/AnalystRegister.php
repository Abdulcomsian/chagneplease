<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Analyst;
use Hash;

class AnalystRegister extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Analyst::create([
                         'firstname' => 'analyst' , 
                         'email' => 'analyst@gmail.com' , 
                         'password' => Hash::make('analyst123')
                        ]);        
    }
}
