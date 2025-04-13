<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colaboradors')->insert([
            'user_id' => 1,
            'filiacao_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
