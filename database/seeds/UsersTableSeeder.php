<?php

use \P4\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{

    # Define the users you want to add
    $users = [
        ['jill@harvard.edu','jill','helloworld'], # <-- Required for P4
        ['jamal@harvard.edu','jamal','helloworld'], # <-- Required for P4
        ['susanbuck@fas.harvard.edu','susan','helloworld'] # <-- Update with your own info, or remove
    ];

    # Get existing users to prevent duplicates
    $existingUsers = User::all()->keyBy('email')->toArray();


    foreach($users as $user) {

        # If the user does not already exist, add them
        if(!array_key_exists($user[0],$existingUsers)) {
            $user = User::create([
                'email' => $user[0],
                'name' => $user[1],
                'password' => Hash::make($user[2]),
            ]);
        }
    }
}
}