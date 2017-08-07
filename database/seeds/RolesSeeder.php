<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert(
            array(
                array('name' => 'admin'),
                array('name' => 'teacher'),
                array('name' => 'student')
            )
        );
    }
}
