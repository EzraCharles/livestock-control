<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FormulacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulaciones')->insert([
            [
                'kilogramos' => 225,
                'porcentaje' =>22.5,
                'importe' => 360,
                'formula_id' => 1,
                'precio_id' => 21,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 359,
                'porcentaje' =>35.9,
                'importe' => 387.72,
                'formula_id' => 1,
                'precio_id' => 22,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 210,
                'porcentaje' =>21,
                'importe' => 1092,
                'formula_id' => 1,
                'precio_id' => 23,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 120,
                'porcentaje' =>12,
                'importe' => 1236,
                'formula_id' => 1,
                'precio_id' => 24,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 55,
                'porcentaje' => 5.5,
                'importe' => 192.5,
                'formula_id' => 1,
                'precio_id' => 25,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 5,
                'porcentaje' => 0.5,
                'importe' => 38,
                'formula_id' => 1,
                'precio_id' => 26,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 1,
                'porcentaje' => 0.1,
                'importe' => 27.56,
                'formula_id' => 1,
                'precio_id' => 27,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'kilogramos' => 25,
                'porcentaje' => 2.5,
                'importe' => 120,
                'formula_id' => 1,
                'precio_id' => 28,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
