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
    }
}
