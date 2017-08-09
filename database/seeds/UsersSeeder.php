<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        function generate_mail()
        {
            return str_random(10) . '@' . str_random(8) . '.' . str_random(4);
        }


        DB::table('users')->insert(
            array(
                array('role_id' => 1, 'name' => 'John', 'surname' => 'Doe', 'email' => 'john@doe.pl', 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1985-01-18'),
                array('role_id' => 2, 'name' => 'Joe', 'surname' => 'Moe', 'email' => 'joe@moe.pl', 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1998-11-19'),
                array('role_id' => 2, 'name' => 'Mary', 'surname' => 'Jane', 'email' => 'mary@jane.pl', 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1990-09-02'),
                array('role_id' => 2, 'name' => 'Erick', 'surname' => 'Tack', 'email' => 'erick@tack.pl', 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1988-06-25'),
                array('role_id' => 2, 'name' => 'Mateusz', 'surname' => 'Kolasa', 'email' => 'mateusz@kolasa.pl', 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15'),
                array('role_id' => 3, 'name' => str_random(6), 'surname' => str_random(6), 'email' => generate_mail(), 'password' => Hash::make('polcode'), 'registration_token' => null, 'birth_date' => '1986-06-15')
            )
        );
    }
}
