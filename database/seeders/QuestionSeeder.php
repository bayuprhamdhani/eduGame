<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */          
    private $questions = [
        ["Siapa wanita paling cantik ?", 1, 1, 1, "", "Trinanda Zalsa"],
        ["Siapa Trinanda Zalsa ?", 1, 1, 1, "", "Wanita paling cantik"],
    ];

    public function run(): void
    {
        foreach ($this->questions as $question) {
            \App\Models\Question::create([
                "question" => $question[0],
                "time" => $question[1],
                "type" => $question[2],
                "user" => $question[3],
                "chalenge" => $question[4],
                "answer" => $question[5]
            ]);
        }
    }
}
