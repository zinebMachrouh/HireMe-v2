<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'picture' => 'profile_pics/yMBW8C7LjAmTGRt4Zpai2GTCrxX3LPu4LkFswsAW.jpg',
            'role_id' => 1
        ]);

        $user->admin()->create([
            'fname' => 'Adam',
            'lname' => 'Smith',
            'user_id' => $user->id
        ]);
    }
}
