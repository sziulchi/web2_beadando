<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\Driver;

    class DriverSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
    {
        $rows = json_decode(file_get_contents(database_path('seeders/data/drivers.json')), true);

        foreach (array_chunk($rows, 200) as $chunk) {
            Driver::insert($chunk);
        }
    }
}
