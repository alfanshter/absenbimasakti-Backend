<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'nfs',
            'username' => 'nfs',
            'password' => Hash::make(123456),
            'email'    => 'nfs@gmail.com',
            'role'     => '1',
            'status'   => '0',
            'grup_id'  => '1'
        ]);
    }
}
