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
                'alimento' => true,
                'materia_seca' => 85,
                'porcion_comestible' => 5.6,
                'grasa' => 1.1,
                'fibra' => 34,
                'ceniza' => 6.1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ensilado',
                'tipo' => 'Formulación',
                'precio' => 1080,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 0,
                'porcion_comestible' => 10,
                'grasa' => 0,
                'fibra' => 0,
                'ceniza' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Grano',
                'tipo' => 'Formulación',
                'precio' => 5200,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 87,
                'porcion_comestible' => 9,
                'grasa' => 2.9,
                'fibra' => 2.7,
                'ceniza' => 1.9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'P. Soya',
                'tipo' => 'Formulación',
                'precio' => 1300,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 90,
                'porcion_comestible' => 45,
                'grasa' => 80,
                'fibra' => 4.9,
                'ceniza' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Miel',
                'tipo' => 'Formulación',
                'precio' => 3500,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 73.5,
                'porcion_comestible' => 3.5,
                'grasa' => 0,
                'fibra' => 40,
                'ceniza' => 9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'UREA',
                'tipo' => 'Formulación',
                'precio' => 7600,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 99,
                'porcion_comestible' => 281,
                'grasa' => 0,
                'fibra' => 0,
                'ceniza' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'MYCOAD',
                'tipo' => 'Formulación',
                'precio' => 4800,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 0,
                'porcion_comestible' => 21,
                'grasa' => 2.2,
                'fibra' => 0,
                'ceniza' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'MINER',
                'tipo' => 'Formulación',
                'precio' => 4800,
                'factor' => 1000,
                'alimento' => true,
                'materia_seca' => 0,
                'porcion_comestible' => 0,
                'grasa' => 0,
                'fibra' => 0,
                'ceniza' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        # Animales
        DB::table('precios')->insert([
            [
                'concepto' => 'Bo', // 29
                'tipo' => 'Animal',
                'precio' => 40,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 160,
                'comentarios' => 'Dientes Leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 39,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 161,
                'rango_alto' => 190,
                'comentarios' => 'Dientes Leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 38,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 191,
                'rango_alto' => 220,
                'comentarios' => 'Dientes Leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 37,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 221,
                'rango_alto' => 270,
                'comentarios' => 'Dientes Leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 36,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 271,
                'rango_alto' => 320,
                'comentarios' => '- 300 Kg Dientes Leche + 300 kg 2 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 35,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 321,
                'rango_alto' => 360,
                'comentarios' => 'Max 2 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Bo',
                'tipo' => 'Animal',
                'precio' => 34,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 361,
                'rango_alto' => 390,
                'comentarios' => 'Max 2 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Tr',
                'tipo' => 'Animal',
                'precio' => 34,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 450,
                'comentarios' => '3 y 4 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'To',
                'tipo' => 'Animal',
                'precio' => 34,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 1200,
                'comentarios' => '5 a 8 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ba',
                'tipo' => 'Animal',
                'precio' => 34,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 160,
                'comentarios' => 'Dientes de leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ba',
                'tipo' => 'Animal',
                'precio' => 33,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 161,
                'rango_alto' => 190,
                'comentarios' => 'Dientes de leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ba',
                'tipo' => 'Animal',
                'precio' => 32,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 191,
                'rango_alto' => 220,
                'comentarios' => 'Dientes de leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ba',
                'tipo' => 'Animal',
                'precio' => 31,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 221,
                'rango_alto' => 270,
                'comentarios' => 'Dientes de leche',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Ba',
                'tipo' => 'Animal',
                'precio' => 29,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 271,
                'rango_alto' => 330,
                'comentarios' => '- 280 Kg Dientes Leche + 280 kg 2 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Vq',
                'tipo' => 'Animal',
                'precio' => 25,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 450,
                'comentarios' => '3 y 4 Palas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'concepto' => 'Vc',
                'tipo' => 'Animal',
                'precio' => 17,
                'factor' => 1,
                'rango' => true,
                'rango_bajo' => 0,
                'rango_alto' => 900,
                'comentarios' => '5 - 8 palas, de $14.00 a $20.00 pesos con el 3% de descuento',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
