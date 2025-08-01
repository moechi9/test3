<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => 'user',
            'email' => 'test@example.com',
            'password' => 'coachtech1106',
        ];
        DB::table('users')->insert($param);
    }
}
