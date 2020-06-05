<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tratamientos')->insert([
            [
                'nombre' => 'Basetyl',
                'precio' => 0.0,
                'precio_id' => 1,
                'tipo_tratamiento_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Flumixin',
                'precio' => 0.0,
                'precio_id' => 2,
                'tipo_tratamiento_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Penicilina',
                'precio' => 0.0,
                'precio_id' => 3,
                'tipo_tratamiento_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Oxitetraciclina',
                'precio' => 0.0,
                'precio_id' => 4,
                'tipo_tratamiento_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Fluvet',
                'precio' => 0.0,
                'precio_id' => 5,
                'tipo_tratamiento_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Gorbazoo',
                'precio' => 0.0,
                'precio_id' => 6,
                'tipo_tratamiento_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Emidocar',
                'precio' => 0.0,
                'precio_id' => 7,
                'tipo_tratamiento_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Cicatrizante',
                'precio' => 0.0,
                'precio_id' => 8,
                'tipo_tratamiento_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Olivitasan',
                'precio' => 0.0,
                'precio_id' => 9,
                'tipo_tratamiento_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Energizante',
                'precio' => 0.0,
                'precio_id' => 10,
                'tipo_tratamiento_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Complejo B',
                'precio' => 0.0,
                'precio_id' => 11,
                'tipo_tratamiento_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Ganabol',
                'precio' => 0.0,
                'precio_id' => 12,
                'tipo_tratamiento_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Suero Vitaminado',
                'precio' => 0.0,
                'precio_id' => 13,
                'tipo_tratamiento_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Cidectin',
                'precio' => 0.0,
                'precio_id' => 14,
                'tipo_tratamiento_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Trodax',
                'precio' => 0.0,
                'precio_id' => 15,
                'tipo_tratamiento_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Lebamisol',
                'precio' => 0.0,
                'precio_id' => 16,
                'tipo_tratamiento_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Bolos',
                'precio' => 0.0,
                'precio_id' => 17,
                'tipo_tratamiento_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Timpacaps',
                'precio' => 0.0,
                'precio_id' => 18,
                'tipo_tratamiento_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Rumenade',
                'precio' => 0.0,
                'precio_id' => 19,
                'tipo_tratamiento_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nombre' => 'Pirofort',
                'precio' => 0.0,
                'precio_id' => 20,
                'tipo_tratamiento_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
