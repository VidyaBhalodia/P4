<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'facility_name' => 'Harvard University Hospital', 
        'degree' =>  1,
        'license' => 1,
        'reference' => 0,
        'fee' =>  200,
        'contact_name' => 'Donna Noble' ,
        'contact_email' => 'donnanoble@nowhere.om',
		
    ]);

    DB::table('hospitals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'facility_name' => 'MIT Medical Center', 
        'degree' =>  1,
        'license' => 1,
        'reference' => 1,
        'fee' =>  550,
        'contact_name' => 'John Jacob Jingleheimer Schmidt' ,
        'contact_email' => 'johnschmidt@nowhere.om',
    ]);

    DB::table('hospitals')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'facility_name' => 'Boston Surgery Center', 
        'degree' =>  0,
        'license' => 1,
        'reference' => 1,
        'fee' =>  150,
        'contact_name' => 'Jean Luc Picard' ,
        'contact_email' => 'jeanpicard@nowhere.om',
    ]);
    }
}
