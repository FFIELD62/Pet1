<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert(array(
            ['name'=>'หมา'],
            ['name'=>'แมว'],
            ['name'=>'เสือ'],
           ));
        }
}