<?php

use Illuminate\Database\Seeder;

class DivisionSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('division_subject')->delete();
        DB::table('division_subject')->insert(
            array(
                array('subject_id' => 2, 'division_id' => 1)
            )
        );
    }
}
