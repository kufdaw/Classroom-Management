<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DivisionsSeeder::class);
        $this->call(DivisionSubjectSeeder::class);
    }
}
