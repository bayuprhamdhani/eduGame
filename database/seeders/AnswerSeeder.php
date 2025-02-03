<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */          
    private $answers = [
        ["Ya"],
        ["Tidak"],
    ];

    public function run(): void
    {
        foreach ($this->answers as $answer) {
            \App\Models\Answer::create([
                "answer" => $answer[0],
            ]);
        }
    }
}
