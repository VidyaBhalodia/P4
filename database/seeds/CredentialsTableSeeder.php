<?php

use Illuminate\Database\Seeder;

class CredentialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('credentials')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_name' => 'jill',
        'facility_name' => 'Harvard University Hospital', 
        'status' =>  'Active',
        'expiration_date' => '2018-01-01' ,
        'followup_date' => '2017-12-15',
    ]);

    DB::table('credentials')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_name' => 'jamal',
        'facility_name' => 'Harvard University Hospital', 
        'status' =>  'Pending',
        'expiration_date' => NULL ,
        'followup_date' => '2016-10-15',
    ]);

    DB::table('credentials')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_name' => 'jamal',
        'facility_name' => 'MIT Medical Center', 
        'status' =>  'Expired',
        'expiration_date' => '2016-06-20' ,
        'followup_date' => '2016-12-01',
    ]);

	DB::table('credentials')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'user_name' => 'jill',
        'facility_name' => 'MIT Medial Center', 
        'status' =>  'Not Credentialled',
        'expiration_date' => NULL,
        'followup_date' => '2017-01-01',
    ]);
    }
}
