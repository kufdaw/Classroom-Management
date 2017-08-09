<?php

use Illuminate\Database\Seeder;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->delete();
        DB::table('divisions')->insert(
            array(
                array('name' => '1A', 'tutor_id' => 2),
                array('name' => '1B', 'tutor_id' => 3),
                array('name' => '2A', 'tutor_id' => 4)
            )
        );
    }
}
