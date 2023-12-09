<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = [
            [
                'username' => 'admin',
                'type' => 1,
                'password' => bcrypt('superadmin'),
            ],
            [
                'username' => 'tamu',
                'type' => 0,
                'password' => bcrypt('tamu01'),
            ],
        ];

        foreach ($user as $key => $user) {
            User::create($user);
        }
    }
}
