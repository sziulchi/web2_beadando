<?php

namespace Database\Seeders;

use App\Models\Gp;
use Illuminate\Database\Seeder;

class GpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = json_decode(file_get_contents(database_path('seeders/data/gps.json')), true);

        foreach (array_chunk($rows, 200) as $chunk) {
            Gp::insert($chunk);
        }
    }
}
