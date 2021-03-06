<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            TiposPersonaTableSeeder::class,
            PersonaTableSeeder::class,
            TiposAnimalesTableSeeder::class,
            DiagnosticosTableSeeder::class,
            TiposTratamientosTableSeeder::class,
            TratamientosTableSeeder::class,
            PreciosTableSeeder::class,
            CorralesTableSeeder::class,
            TiposReproduccionTableSeeder::class,
            TipoAlimentacionTableSeeder::class,
            AnimalTableSeeder::class,
            FormulaTableSeeder::class,
            FormulacionTableSeeder::class,

        ]);

    }

}
