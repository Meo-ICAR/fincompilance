<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FilamentUserSeeder::class,
            FinancialSeeder::class,
            OamSeeder::class,
            ComuneSeeder::class,
            OamSeeder::class,
            AgenteInAttivitaFinanziariaSeeder::class,
            DocumentTypeSeeder::class,
        ]);
    }
}
