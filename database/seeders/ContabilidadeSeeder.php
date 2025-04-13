<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContabilidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contabilidades')->insert([
            'descricao' => 'Saldos incío',
            'debito' => 0.00,
            'credito' => 0.00,
            'saldo' => 0.00,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
