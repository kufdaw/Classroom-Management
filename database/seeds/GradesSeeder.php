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
        DB::table('grades')->delete();
        DB::table('grades')->insert(
            array(
                array('value' => '4', 'student_id' => 5, 'subject_id' => 1 ),
                array('value' => '2', 'student_id' => 6, 'subject_id' => 2 ),
                array('value' => '2', 'student_id' => 6, 'subject_id' => 5 ),
                array('value' => '2', 'student_id' => 7, 'subject_id' => 3 ),
                array('value' => '4', 'student_id' => 7, 'subject_id' => 6 ),
                array('value' => '5', 'student_id' => 10, 'subject_id' => 6 ),
                array('value' => '3', 'student_id' => 8, 'subject_id' => 6 ),
                array('value' => '3', 'student_id' => 6, 'subject_id' => 5 ),
                array('value' => '1', 'student_id' => 7, 'subject_id' => 3 ),
                array('value' => '6', 'student_id' => 6, 'subject_id' => 1 ),
                array('value' => '6', 'student_id' => 8, 'subject_id' => 1 ),
                array('value' => '4', 'student_id' => 10, 'subject_id' => 4 ),
                array('value' => '5', 'student_id' => 11, 'subject_id' => 1 ),
                array('value' => '3', 'student_id' => 11, 'subject_id' => 7 ),
                array('value' => '2', 'student_id' => 9, 'subject_id' => 3)
            )
        );
    }
}
