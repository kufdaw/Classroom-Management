<?php

use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        DB::table('subjects')->insert(
            array(
                array('name' => 'biology'),
                array('name' => 'chemistry'),
                array('name' => 'maths'),
                array('name' => 'music'),
                array('name' => 'german'),
                array('name' => 'self-defence'),
                array('name' => 'it'),
                array('name' => 'sport'),
                array('name' => 'english')
            )
        );
    }
}
