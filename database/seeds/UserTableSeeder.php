<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'access_token' => Str::random(16),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ));


        factory(\App\ClassModel::class, 5)->create();
        factory(\App\Student::class, random_int(1, 10))->create();
    }
}
