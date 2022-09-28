<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        Users::factory(1)->create();
        // Users::factory(100)->create();
=======
        DB::table('users')->insert([
            "id" => 1,
            'phone' => "+628422323",
            'name' => "Super Admin",
            'email' => 'superadmin@gmail.com',
            'level' => 'superadmin',
            'gender' => 'L',
            'address' => 'address',
            'date_born' => '2000-11-11',
            'password' => Hash::make('Password'),
        ]);
>>>>>>> e6c86d4ae319f8a1a8779e8069d1f46dce83cea2
    }
}
