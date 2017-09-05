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
                array('value' => '4', 'student_id' => 6, 'subject_id' => 2, 'teacher_id' => 2),
                array('value' => '2', 'student_id' => 6, 'subject_id' => 2, 'teacher_id' => 2),
                array('value' => '2', 'student_id' => 6, 'subject_id' => 5, 'teacher_id' => 2),
                array('value' => '2', 'student_id' => 7, 'subject_id' => 3, 'teacher_id' => 3),
                array('value' => '4', 'student_id' => 7, 'subject_id' => 3, 'teacher_id' => 3)
            )
        );
    }
}
