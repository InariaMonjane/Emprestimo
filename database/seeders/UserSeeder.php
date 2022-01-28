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
            'nome' => 'António',
            'apelido' => 'Cumbe',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'perfil_id' => 1,
            'nome' => 'Inária',
            'apelido' => 'Monjane',
            'email' => 'inaria@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'perfil_id' => 1,
            'nome' => 'Jorge',
            'apelido' => 'Marry',
            'email' => 'jorge@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
