<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
class AdminRegister extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Admin::create(['firstname' => 'admin' , 'email' => 'admin@gmail.com' , 'password' => Hash::make('admin123') ]);       
    }
}
