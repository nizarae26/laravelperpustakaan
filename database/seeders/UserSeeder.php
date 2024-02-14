<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 123456,
            'email_verified_at' => now(),
        ])->assignRole('admin');

        User::create([
            'name' => 'operator',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ])->assignRole('operator');

        User::create([
            'name' => 'peminjam',
            'email' => 'peminjam@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ])->assignRole('peminjam');
    }
}
