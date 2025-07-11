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
            'full_name' => 'Admin User',
            'user_name' => 'admin_example',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

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

        User::create([
            'full_name' => 'Maria Lopez',
            'user_name' => 'maria_lopez',
            'email' => 'maria@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
        ]);
            
        User::create([
            'full_name' => 'Juan Dela Cruz',
            'user_name' => 'juandelacruz',
            'email' => 'juan@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
        ]);
            
        User::create([
            'full_name' => 'Angela Reyes',
            'user_name' => 'angela_reyes',
            'email' => 'angela@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
        ]);
            
        User::create([
            'full_name' => 'Eli Navarro',
            'user_name' => 'elinavarro',
            'email' => 'eli@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
        ]);


    }
}
