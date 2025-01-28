<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */          
    private $types = [
        ["Truth"],
        ["Dare"],
    ];

    public function run(): void
    {
        foreach ($this->types as $type) {
            \App\Models\Type::create([
                "type" => $type[0],
            ]);
        }
    }
}
