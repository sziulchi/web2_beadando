<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = json_decode(file_get_contents(database_path('seeders/data/results.json')), true);

        foreach (array_chunk($rows, 200) as $chunk) {
            Result::insert($chunk);
        }
    }
}
