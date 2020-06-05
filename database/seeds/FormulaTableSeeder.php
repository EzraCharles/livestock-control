<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FormulaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulas')->insert([
            [
                'nombre' => 'Recepcion Silo MB',
                'proteina' => 13.76,
                'grasa' => 10.46,
                'importe' => 3453.78,
                //'precio_kilo' => 3.45378,
                'kilogramos' => 1000,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
