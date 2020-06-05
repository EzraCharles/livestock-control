<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animales')->insert([
            [
                'arete' => '484001407489329',
                'persona_id' => 4,
                'tipo_animal_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'arete' => '484001407645104',
                'persona_id' => 4,
                'tipo_animal_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'arete' => '484001407643934',
                'persona_id' => 4,
                'tipo_animal_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'arete' => '484001407643931',
                'persona_id' => 4,
                'tipo_animal_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'arete' => '484001407643932',
                'persona_id' => 4,
                'tipo_animal_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
