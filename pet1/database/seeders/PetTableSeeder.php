<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet')->insert(array(
            [
                'name' => 'Bobydog',
                'type_id' => 1,              
            ],

            [
                'name' => 'Bobycat',
                'type_id' => 2,  
            ],

            [
                'name' => 'BobyT',
                'type_id' => 2,  
            ],
        ));
           

    }
}