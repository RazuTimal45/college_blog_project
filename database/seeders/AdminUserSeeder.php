<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'admin', 
            'bio'=>'administrator account',
            'email_verified_at' => now(), 
        ]);
        User::create([
            'name' => 'raju',
            'email' => 'raju@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'blogger', 
            'bio'=>'blogger account',
            'email_verified_at' => now(), 
        ]);
    }
}