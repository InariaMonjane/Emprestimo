<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'acesso' => 'Gestor',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('perfils')->insert([
            'acesso' => 'Operador',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
