<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Shiela Mae Albeyo',
            'user_name' => 'shielaMae',
            'email' => 'admin1@fake.com',
            'password' => 'Annyeong',
        ]);

        User::create([
            'full_name' => 'Shane Marlou Albeyo',
            'user_name' => 'shaneMarlou',
            'email' => 'admin2@fake.com',
            'password' => 'Annyeong',
        ]);

        User::create([
            'full_name' => 'Sharlyn Mari Albeyo',
            'user_name' => 'sharlynMari',
            'email' => 'admin3@fake.com',
            'password' => 'Annyeong',
        ]);
    }
}
