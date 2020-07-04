<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PreciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('precios')->insert([
            // Tratamientos Sanitarios
            [
                'concepto' => 'Basetyl',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Flumixin',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Penicilina',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Oxitetraciclina',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Fluvet',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Gorbazoo',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Emidocar',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Cicatrizante',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Olivitasan',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Energizante',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Complejo B',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ganabol',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Suero Vitaminado',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Cidectin',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Trodax',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Lebamisol',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bolos',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Timpacaps',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Rumenade',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Pirofort',
                'tipo' => 'Tratamiento',
                'precio' => 0.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);


        # Formulaciones
        DB::table('precios')->insert([
            [
                'concepto' => 'Rastrojo', //21
                'tipo' => 'Formulación',
                'precio' => 1600,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ensilado',
                'tipo' => 'Formulación',
                'precio' => 1080,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Grano',
                'tipo' => 'Formulación',
                'precio' => 5200,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'P. Soya',
                'tipo' => 'Formulación',
                'precio' => 1300,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Miel',
                'tipo' => 'Formulación',
                'precio' => 3500,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'UREA',
                'tipo' => 'Formulación',
                'precio' => 7600,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'MYCOAD',
                'tipo' => 'Formulación',
                'precio' => 4800,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'MINER',
                'tipo' => 'Formulación',
                'precio' => 4800,
                'factor' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
