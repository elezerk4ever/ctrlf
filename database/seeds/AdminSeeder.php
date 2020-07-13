<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(['name'=>'william galas','email'=>'williamgalas2@gmail.com','password'=>Hash::make('import19')]);
    }
}
