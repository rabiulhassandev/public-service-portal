<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hellouno.com',
            'phone' => '01700000000',
            'address' => 'Upazila Parishad, Satkania',
            'union_name' => 'Satkania',
            'word_number' => '1',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
