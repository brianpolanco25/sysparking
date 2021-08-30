<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>'Brian Polanco',
            'email'      =>'brianpolancodisenos@gmail.com',
            'password'  => bcrypt('bcmp1994'),
        ]);

        User::factory()->times(10)->create();
    }
}
