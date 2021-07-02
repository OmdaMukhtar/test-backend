<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            0 => [
                'id' => 1,
                'name' => 'Demo',
                'email' => 'demo@academic.com',
                'email_verified_at' => '2021-07-01',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ));


        factory(\App\ClassModel::class, 5)->create();
        factory(\App\Student::class, 20)->create();
    }
}
