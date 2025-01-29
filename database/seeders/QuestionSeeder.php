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
        [1,
        "Apa yang dimaksud dengan hukum Newton pertama?",
        10,
        1,
        1,
        "",
        "Hukum Newton pertama atau hukum kelembaman menyatakan bahwa benda yang tidak terpengaruh oleh gaya eksternal akan tetap dalam keadaan diam atau bergerak lurus beraturan dengan kecepatan konstan.",
        ""
        ],
        [1,
        "Sebutkan tiga contoh benda yang mengalami perubahan wujud!",
        5,
        1,
        1,
        "",
        "Es mencair menjadi air, air mendidih menjadi uap, dan air menguap menjadi gas.",
        ""
        ],
        [1,
        "Apa yang menyebabkan bumi memiliki gaya gravitasi?",
        7,
        1,
        1,
        "",
        "Gravitasi di bumi disebabkan oleh massa bumi yang besar, yang menarik benda-benda ke pusat bumi.",
        ""
        ],
        [1,
        "Apa yang dimaksud dengan fotosintesis?",
        5,
        1,
        1,
        "",
        "Fotosintesis adalah proses di mana tumbuhan hijau mengubah energi matahari menjadi energi kimia dengan menggunakan klorofil untuk mengubah karbon dioksida dan air menjadi glukosa dan oksigen.",
        ""
        ],
        [1,
        "Jelaskan proses terjadinya hujan!",
        7,
        1,
        1,
        "",
        "Hujan terjadi ketika uap air yang ada di atmosfer mengembun membentuk awan, dan ketika awan tersebut jenuh dengan uap air, air akan turun ke bumi sebagai hujan.",
        ""
        ],
        [1,
        "Apa yang dimaksud dengan ekosistem?",
        10,
        1,
        1,
        "",
        "Ekosistem adalah suatu sistem yang terdiri dari komponen biotik (makhluk hidup) dan abiotik (lingkungan fisik) yang saling berinteraksi di suatu area.",
        ""
        ],
        [1,
        "Sebutkan sifat-sifat benda cair!",
        7,
        1,
        1,
        "",
        "Benda cair memiliki volume tetap tetapi bentuknya berubah mengikuti wadahnya, dan dapat mengalir dengan mudah.",
        ""
        ],
        [1,
        "Apa yang dimaksud dengan hukum Archimedes?",
        7,
        1,
        1,
        "",
        "Hukum Archimedes menyatakan bahwa gaya angkat yang diterima benda yang terendam dalam cairan sama dengan berat cairan yang dipindahkan oleh benda tersebut.",
        ""
        ],
        [1,
        "Apa yang dimaksud dengan konduktor dan isolator?",
        7,
        1,
        1,
        "",
        "Konduktor adalah bahan yang dapat menghantarkan listrik atau panas dengan baik, sedangkan isolator adalah bahan yang tidak dapat menghantarkan listrik atau panas.",
        ""
        ],
        [1,
        "Bagaimana cara menyimpan energi dalam baterai?",
        7,
        1,
        1,
        "",
        "Energi disimpan dalam baterai melalui proses kimia, di mana energi kimia disimpan di dalam elektrode dan dapat dilepaskan saat baterai digunakan.",
        ""
        ],
    ];

    public function run(): void
    {
        foreach ($this->questions as $question) {
            \App\Models\Question::create([
                "lesson" => $question[0],
                "question" => $question[1],
                "time" => $question[2],
                "type" => $question[3],
                "user" => $question[4],
                "chalenge" => $question[5],
                "answer" => $question[6],
                "path" => $question[7]
            ]);
        }
    }
}
