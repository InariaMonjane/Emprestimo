<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'perfil_id' => 1,
            'nome' => 'Jorge',
            'apelido' => 'Simango',
            'email' => 'jorge@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
