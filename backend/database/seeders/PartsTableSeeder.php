<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            [
                'name' => 'front'
            ],
            [
                'name' => 'back'
            ],
            [
                'name' => 'infra'
            ],
        ]);
    }
}
