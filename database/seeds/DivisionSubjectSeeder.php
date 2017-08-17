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
                array('subject_id' => 2, 'division_id' => 1, 'user_id' => '2'),
                array('subject_id' => 3, 'division_id' => 1, 'user_id' => '3'),
                array('subject_id' => 4, 'division_id' => 1, 'user_id' => '4'),
                array('subject_id' => 5, 'division_id' => 1, 'user_id' => '2'),
                array('subject_id' => 1, 'division_id' => 2, 'user_id' => '5'),
                array('subject_id' => 3, 'division_id' => 2, 'user_id' => '3'),
                array('subject_id' => 4, 'division_id' => 2, 'user_id' => '4'),
                array('subject_id' => 6, 'division_id' => 2, 'user_id' => '5'),
                array('subject_id' => 8, 'division_id' => 2, 'user_id' => '2'),
                array('subject_id' => 9, 'division_id' => 2, 'user_id' => '3'),
                array('subject_id' => 1, 'division_id' => 3, 'user_id' => '2'),
                array('subject_id' => 2, 'division_id' => 3, 'user_id' => '3'),
                array('subject_id' => 4, 'division_id' => 3, 'user_id' => '4'),
                array('subject_id' => 6, 'division_id' => 3, 'user_id' => '5'),
                array('subject_id' => 8, 'division_id' => 3, 'user_id' => '2')
            )
        );
    }
}
