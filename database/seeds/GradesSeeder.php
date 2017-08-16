<?php

use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Grades')->delete();
        DB::table('Grades')->insert(
            array(
                array('value' => '4', 'subject_id')

            )
        );
    }
}
