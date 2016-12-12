<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(CredentialsTableSeeder::class);
		$this->call(HospitalsTableSeeder::class);
		$this->call(UsersTableSeeder::class);
    }
}
