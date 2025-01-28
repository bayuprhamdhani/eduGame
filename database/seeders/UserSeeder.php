<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */          
    private $users = [
        ["Bayu", "bayuraina@gmail.com", "123456"],
        ["Trinanda", "trinanda@gmail.com", "123456"],
    ];

    public function run(): void
    {
        foreach ($this->users as $user) {
            \App\Models\User::create([
                "name" => $user[0],
                "email" => $user[1],
                "password" => $user[2]
            ]);
        }
    }
}
